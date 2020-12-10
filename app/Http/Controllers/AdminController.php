<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function banner()
    {
        return view('admin.banner');
    }
// Kategori 
    public function kategori()
    {
        $kategori = Kategori::all();
        return view('admin.kategori',['kategori' => $kategori]);
    }

    public function kategori_add(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'gambar' => 'required|mimes:jpeg,png,jpg|max:4096',
        ],
        [
            'kategori.required' => 'Nama Kategori dibutuhkan!',
            'gambar.required' => 'Gambar Kategori dibutuhkan!',
            'gambar.mimes' => 'Hanya Gambar Berekstensi jpeg,png,jpg yang dibolehkan!',
            'gambar.max' => 'Size tidak boleh dari 4Mb!'
        ]);
        $file = $request->file('gambar');
        $destinationPath = public_path('/img');
        $name = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // 270x270 px
        $canvas = Image::canvas(270, 270);
        $resizeImage  = Image::make($file)->resize(270, 270, function($constraint) {
            $constraint->aspectRatio();
        })->trim();
        $canvas->insert($resizeImage, 'center');
        $canvas->save($destinationPath . '/kategori'. '/' . $name);
        // 40x40 px
        $smallcanvas = Image::canvas(40, 40);
        $resizesmallImage  = Image::make($file)->resize(40, 40, function($constraint) {
            $constraint->aspectRatio();
        })->trim();
        $smallcanvas->insert($resizesmallImage, 'center');
        $smallcanvas->save($destinationPath . '/kategori/small/' . $name);
        // DB Save
        $newkatdb = new Kategori;
        $newkatdb->nama_kategori = $request->kategori;
        $newkatdb->gambar = $name;
        $newkatdb->save();
        return redirect()->route('kategori')->with(['status' => 'sukses','message' => ' Data Kategori Berhasil Ditambah!']);
    }

    public function kategori_edit(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'kategori' => 'required',
            'gambar' => 'required|mimes:jpeg,png,jpg|max:4096',
        ],
        [
            'kategori.required' => 'Nama Kategori dibutuhkan!',
            'gambar.required' => 'Gambar Kategori dibutuhkan!',
            'gambar.mimes' => 'Hanya Gambar Berekstensi jpeg,png,jpg yang dibolehkan!',
            'gambar.max' => 'Size tidak boleh dari 4MB!'
        ]);

        $db_kategori = Kategori::where('id', $request->kat_id)->first();
        $del_kat = public_path('/img/kategori/'.$db_kategori->gambar);
        $del_kat_small = public_path('/img/kategori/small/'.$db_kategori->gambar);
        if ( File::exists($del_kat) && File::exists($del_kat_small) ) {
            File::delete($del_kat);
            File::delete($del_kat_small);
            $file = $request->file('gambar');
            $destinationPath = public_path('/img');
            $name = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            // 270x270 px
            $canvas = Image::canvas(270, 270);
            $resizeImage  = Image::make($file)->resize(270, 270, function($constraint) {
                $constraint->aspectRatio();
            })->trim();
            $canvas->insert($resizeImage, 'center');
            $result_img = $canvas->save($destinationPath . '/kategori'. '/' . $name);
            // 40x40 px
            $smallcanvas = Image::canvas(40, 40);
            $resizesmallImage  = Image::make($file)->resize(40, 40, function($constraint) {
                $constraint->aspectRatio();
            })->trim();
            $smallcanvas->insert($resizesmallImage, 'center');
            $result_small_img = $smallcanvas->save($destinationPath . '/kategori/small/' . $name);
            $result_db = Kategori::where('id',$request->kat_id)->update([
                'nama_kategori' => $request->kategori,
                'gambar' => $name
            ]);
            if ($result_img && $result_small_img && $result_db) {
                return redirect()->route('kategori')->with(['status' => 'sukses','message' => ' Kategori berhasil diubah!']);
            }
            else {
                return redirect()->route('kategori')->with(['status' => 'error','message' => ' Gagal mengupdate data, hubungi administrator!']);
            }
        }
        else {
            return redirect()->route('kategori')->with(['status' => 'error','message' => ' File yang ingin dihapus tidak ditemukan!']);
        }
    }

    public function kategori_del(Request $request)
    {
        // dd($request->all());
        $db_kategori = Kategori::where('id', $request->kat_id)->first();
        $db_produk = Produk::where('kategori_id', $request->kat_id)->get();
        foreach ($db_produk as $db_prd) {
            $del = public_path('/img/produk/'.$db_prd->gambar);
            if (File::exists($del)) {
                File::delete($del);
                Produk::destroy($db_prd->id);
            }
            else {
                return redirect()->route('kategori')->with(['status' => 'error','message' => ' File yang ingin dihapus tidak ditemukan!']);
            }
        }
        $del_kat = public_path('/img/kategori/'.$db_kategori->gambar);
        if (File::exists($del_kat)) {
            File::delete($del_kat);
            Kategori::destroy($db_kategori->id);
            return redirect()->route('kategori')->with(['status' => 'sukses','message' => ' Kategori berhasil dihapus!']);
        }
        else {
            return redirect()->route('kategori')->with(['status' => 'error','message' => ' File yang ingin dihapus tidak ditemukan!']);
        }
    }

// Produk 
    public function produk()
    {
        $produk = Produk::all();
        return view('admin.produk',['produk' => $produk]);
    }

    public function produk_detail($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('admin.d_produk',['produk' => $produk]);
    }

    public function produk_add()
    {
        $kategori = Kategori::all();
        return view('admin.add_produk', ['kategori' => $kategori]);
    }

    public function produk_add_post(Request $request)
    {
        $request->validate([
            'nama_prod' => 'required',
            'desc_sing_prod' => 'required',
            'desc_prod' => 'required',
            'hrg_prod' => 'required|numeric',
            'disc_prod' => 'required',
            'berat_prod' => 'required',
            'stok_prod' => 'required',
            'kat_prod' => 'required|numeric',
            'gambar_prod' => 'required|mimes:jpeg,png,jpg|max:4096',
        ]);
        $produk_db = new Produk;
        $produk_db->nama_produk = $request->nama_prod;
        $produk_db->deskripsi_singkat = $request->desc_sing_prod;
        $produk_db->deskripsi = $request->desc_prod;
        $produk_db->harga = $request->hrg_prod;
        $produk_db->discount = $request->disc_prod;
        $produk_db->berat = $request->berat_prod . ' gram';
        $produk_db->stok = $request->stok_prod;
        $produk_db->status = 1;
        $produk_db->preorder = 0;
        $produk_db->recommended = 0;
        $produk_db->kategori_id = $request->kat_prod;
        
        $file = $request->file('gambar_prod');
        $destinationPath = public_path('/img');
        $name = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // 270x270 px
        $canvas = Image::canvas(270, 270);
        $resizeImage  = Image::make($file)->resize(270, 270, function($constraint) {
            $constraint->aspectRatio();
        })->trim();
        $canvas->insert($resizeImage, 'center');
        $canvas->save($destinationPath . '/produk'. '/' . $name);
        // 40x40 px
        $smallcanvas = Image::canvas(40, 40);
        $resizesmallImage  = Image::make($file)->resize(40, 40, function($constraint) {
            $constraint->aspectRatio();
        })->trim();
        $smallcanvas->insert($resizesmallImage, 'center');
        $smallcanvas->save($destinationPath . '/produk/small/' . $name);
        // DB Save
        $produk_db->gambar = $name;
        $produk_db->save();
        return redirect()->route('produk')->with(['status' => 'sukses','message' => ' Data Produk Berhasil Ditambah!']);
    }

    public function produk_edit($id)
    {
        $kategori = Kategori::all();
        $produk = Produk::where('id', $id)->first();
        return view('admin.edit_produk',['produk' => $produk, 'kategori' => $kategori]);
    }

    public function produk_edit_post(Request $request)
    {
        // dd($request->all());
        if ($request->gambar_prod) {
            $request->validate([
                'nama_prod' => 'required',
                'desc_sing_prod' => 'required',
                'desc_prod' => 'required',
                'hrg_prod' => 'required|numeric',
                'disc_prod' => 'required',
                'berat_prod' => 'required',
                'stok_prod' => 'required',
                'kat_prod' => 'required|numeric',
                'gambar_prod' => 'required|mimes:jpeg,png,jpg|max:4096',
            ]);
            $db_produk = Produk::where('id', $request->id_prod)->first();
            $del_kat = public_path('/img/produk/'.$db_produk->gambar);
            $del_kat_small = public_path('/img/produk/small/'.$db_produk->gambar);
            if ( File::exists($del_kat) && File::exists($del_kat_small) ) {
                File::delete($del_kat);
                File::delete($del_kat_small);
                $file = $request->file('gambar_prod');
                $destinationPath = public_path('/img');
                $name = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                // 270x270 px
                $canvas = Image::canvas(270, 270);
                $resizeImage  = Image::make($file)->resize(270, 270, function($constraint) {
                    $constraint->aspectRatio();
                })->trim();
                $canvas->insert($resizeImage, 'center');
                $result_img = $canvas->save($destinationPath . '/produk'. '/' . $name);
                // 40x40 px
                $smallcanvas = Image::canvas(40, 40);
                $resizesmallImage  = Image::make($file)->resize(40, 40, function($constraint) {
                    $constraint->aspectRatio();
                })->trim();
                $smallcanvas->insert($resizesmallImage, 'center');
                $result_small_img = $smallcanvas->save($destinationPath . '/produk/small/' . $name);
                $result_db = Produk::where('id',$request->id_prod)->update([
                    'nama_produk' => $request->nama_prod,
                    'deskripsi_singkat' => $request->desc_sing_prod,
                    'deskripsi' => $request->desc_prod,
                    'gambar' => $name,
                    'harga' => $request->hrg_prod,
                    'discount' => $request->disc_prod,
                    'berat' => $request->berat_prod . ' gram',
                    'stok' => $request->stok_prod,
                    'status' => 1,
                    'preorder' => 0,
                    'recommended' => 0,
                    'kategori_id' => $request->kat_prod,
                ]);
                if ($result_img && $result_small_img && $result_db) {
                    return redirect()->route('produk')->with(['status' => 'sukses','message' => ' Produk berhasil diubah!']);
                }
                else {
                    return redirect()->route('produk')->with(['status' => 'error','message' => ' Gagal mengupdate data, hubungi administrator!']);
                }
            }
            else {
                return redirect()->route('produk')->with(['status' => 'error','message' => ' File yang ingin dihapus tidak ditemukan!']);
            }
        }
        else {
            $request->validate([
                'nama_prod' => 'required',
                'desc_sing_prod' => 'required',
                'desc_prod' => 'required',
                'hrg_prod' => 'required|numeric',
                'disc_prod' => 'required',
                'berat_prod' => 'required',
                'stok_prod' => 'required',
                'kat_prod' => 'required|numeric',
            ]);
            $result_db = Produk::where('id',$request->id_prod)->update([
                'nama_produk' => $request->nama_prod,
                'deskripsi_singkat' => $request->desc_sing_prod,
                'deskripsi' => $request->desc_prod,
                'harga' => $request->hrg_prod,
                'discount' => $request->disc_prod,
                'berat' => $request->berat_prod . ' gram',
                'stok' => $request->stok_prod,
                'status' => 1,
                'preorder' => 0,
                'recommended' => 0,
                'kategori_id' => $request->kat_prod,
            ]);
            if ($result_db) {
                return redirect()->route('produk')->with(['status' => 'sukses','message' => ' Data Produk Berhasil Diubah!']);
            }
            else {
                return redirect()->route('produk')->with(['status' => 'error','message' => ' Gagal mengupdate data, hubungi administrator!']);
            }
        }
    }

    public function produk_del(Request $request)
    {
        // dd($request->all());
        $produk_db = Produk::where('id', $request->prod_id)->first();
        $del = public_path('/img/produk/'.$produk_db->gambar);
        $del_small = public_path('/img/produk/small/'.$produk_db->gambar);
        if (File::exists($del) && File::exists($del_small)) {
            File::delete($del);
            File::delete($del_small);
            Produk::destroy($produk_db->id);
            return redirect()->route('produk')->with(['status' => 'sukses','message' => ' Produk berhasil dihapus!']);
        }
        else {
            return redirect()->route('produk')->with(['status' => 'error','message' => ' Gagal menghapus data, hubungi administrator!']);
        }
        
    }
}
