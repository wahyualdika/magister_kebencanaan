<?php

namespace App\Http\Controllers;

use App\Alumni;
use App\EvaluasiLanjutan;
use App\EvaluasiLulusan;
use App\JenisKemampuan;
use App\Mahasiswa;
use App\MahasiswaDanDana;
use App\MahasiswaDanLulusan;
use App\Penelitian;
use App\PenelitianMahasiswa;
use Illuminate\Http\Request;
use Symfony\Component\Translation\MetadataAwareInterface;
use function Symfony\Component\VarDumper\Tests\Caster\reflectionParameterFixture;

class MahasiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function daftarView()
    {
        return view('pages.mahasiswa.daftarTampil');
    }

    public function mahasiswaView()
    {
        $datas = Mahasiswa::all();
        return view('pages.mahasiswa.adminMahasiswaView')->withDatas($datas);
    }

    public function mahasiswaForm()
    {
        return view('pages.mahasiswa.adminMahasiswaForm');
    }

    public function mahasiswaStore(Request $request)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'asalS1' => 'required|max:255',
            'instansiKerja' => 'max:255',
        ));

        $data = new Mahasiswa();
        $data->nama = $request->nama;
        $data->asal_s1 = $request->asalS1;
        $data->instansi_kerja_terakhir = $request->instansiKerja;

        $data->save();
        return redirect()->route('admin.mahasiswa.view');
    }

    public function mahasiswaFormUpdate($id)
    {
        $data = Mahasiswa::find($id);
        return view('pages.mahasiswa.adminMahasiswaUpdate')->withData($data);
    }

    public function mahasiswaUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'asalS1' => 'required|max:255',
            'instansiKerja' => 'max:255',
        ));

        $data = Mahasiswa::find($id);
        $data->nama = $request->nama;
        $data->asal_s1 = $request->asalS1;
        $data->instansi_kerja_terakhir = $request->instansiKerja;

        $data->save();
        return redirect()->route('admin.mahasiswa.view');
    }

    public function mahasiswaDelete($id)
    {
        $data = Mahasiswa::find($id);
        $data->penelitian()->delete();
        $data->delete();
        return redirect()->route('admin.mahasiswa.view');
    }

    //Penelitian Mahasiswa Section

    public function mahasiswaPenelitianView()
    {
        $datas = PenelitianMahasiswa::all();
        return view('pages.mahasiswa.penelitianMahasiswaView')->withDatas($datas);
    }

    public function mahasiswaPenelitianForm()
    {
        $mahasiswas = Mahasiswa::all();
        return view('pages.mahasiswa.penelitianMahasiswaForm')->withMahasiswas($mahasiswas);
    }

    public function mahasiswaPenelitianStore(Request $request)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'judulPenelitian' => 'required|max:255',
            'tahunPenelitian' => 'max:255',
        ));

        $data = new PenelitianMahasiswa();
        $data->mahasiswa_id = $request->nama;
        $data->judul_penelitian = $request->judulPenelitian;
        $data->tahun_penelitian = $request->tahunPenelitian;

        $data->save();
        return redirect()->route('mahasiswa.penelitian.view');
    }

    public function mahasiswaPenelitianFormUpdate($id)
    {
        $data = PenelitianMahasiswa::find($id);
        return view('pages.mahasiswa.penelitianMahasiswaUpdate')->withData($data);
    }

    public function mahasiswaPenelitianUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'judulPenelitian' => 'required|max:255',
            'tahunPenelitian' => 'max:255',
        ));


        $data = PenelitianMahasiswa::find($id);
        $data->mahasiswa_id = $request->nama;
        $data->judul_penelitian = $request->judulPenelitian;
        $data->tahun_penelitian = $request->tahunPenelitian;
        //dd($data);
        $data->save();
        return redirect()->route('mahasiswa.penelitian.view');
    }

    public function mahasiswaPenelitianDelete($id)
    {
        $data = PenelitianMahasiswa::find($id);
        $data->delete();
        return redirect()->route('mahasiswa.penelitian.view');
    }

    //mahasiswa dan lulusan section
    public function viewOnlyMhs()
    {
        $datas = MahasiswaDanLulusan::all()->sortByDesc('tahun_akademik')->take(5);
        $jumlah = MahasiswaDanLulusan::all()->count();
        //dd($datas);
        $years = array();
        $time = new \DateTime('now');
        $years[0] = $time->modify('-0 year' )->format('Y');
        $years[1] = $time->modify('-1 year' )->format('Y');
        $years[2] = $time->modify('-1 year' )->format('Y');
        $years[3] = $time->modify('-1 year' )->format('Y');
        $years[4] = $time->modify('-1 year' )->format('Y');
        //dd($datas);
       return view('pages.mahasiswa.viewMhsDanLulusanOnly')->withYears($years)->withDatas($datas)->withJumlah($jumlah);
    }

    public function viewAllLulusanMhs()
    {
        $jumlahs = array();
        $jumlahs[0] = MahasiswaDanLulusan::sum('daya_tampung');
        $jumlahs[1] = MahasiswaDanLulusan::sum('ikut_seleksi');
        $jumlahs[2] = MahasiswaDanLulusan::sum('lulus_seleksi');
        $jumlahs[3] = MahasiswaDanLulusan::sum('mhsbr_bukan_transfer');
        $jumlahs[4] = MahasiswaDanLulusan::sum('mhsbr_transfer');
        $jumlahs[5] = MahasiswaDanLulusan::sum('total_mhs_bknTransfer');
        $jumlahs[6] = MahasiswaDanLulusan::sum('total_mhs_transfer');
        $jumlahs[7] = MahasiswaDanLulusan::sum('lulusan_bkn_transfer');
        $jumlahs[8] = MahasiswaDanLulusan::sum('lulusan_transfer');
        $jumlahs[9] = MahasiswaDanLulusan::sum('ipk_reg_min');
        $jumlahs[10] = MahasiswaDanLulusan::sum('ipk_reg_rat');
        $jumlahs[11] = MahasiswaDanLulusan::sum('ipk_reg_mak');
        $jumlahs[12] = MahasiswaDanLulusan::sum('jumlah_mahasiswa_wna');
        $datas = MahasiswaDanLulusan::all();
        return view('pages.mahasiswa.mhsDanLulusanView')->withDatas($datas)->withJumlahs($jumlahs);
    }

    public function formLulusanMhs()
    {
        $years = array();
        $time = new \DateTime('now');
        $newtime = $time->modify('-0 year' )->format('Y');
        $newtime1= $time->modify('-1 year' )->format('Y');
        $newtime2= $time->modify('-1 year' )->format('Y');
        $newtime3= $time->modify('-1 year' )->format('Y');
        $newtime4= $time->modify('-1 year' )->format('Y');
        $years[0] = $newtime;
        $years[1] = $newtime1;
        $years[2] = $newtime2;
        $years[3] = $newtime3;
        $years[4] = $newtime4;
        return view('pages.mahasiswa.mhsDanLulusanForm')->withYears($years);
    }

    public function storeLulusanMhs(Request $request)
    {
        $this->validate($request,array(
            'tahunAkademik' => 'required|numeric',
            'dayaTampung' => 'required|numeric',
            'ikutSeleksi' => 'required|numeric',
            'lulusSeleksi' => 'required|numeric',
            'bukanTransfer'=>'required|numeric',
            'transfer'=>'required|numeric',
            'totalBknTransfer' => 'required|numeric',
            'totalTransfer' => 'required|numeric',
            'lulusBknTransfer' => 'required|numeric',
            'lulusTransfer' => 'required|numeric',
            'ipkmin' => 'required|numeric',
            'ipkmak' => 'required|numeric',
            'ipkrat' => 'required|numeric',
            'jumlahWNA' => 'required|numeric',
        ));

        $id = MahasiswaDanLulusan::where('tahun_akademik',$request->tahunAkademik)->get(['id'])->toArray();
        if($id != null)
        {
            $data = MahasiswaDanLulusan::find($id[0]["id"]);
            $data->tahun_akademik = $request->tahunAkademik;
            $data->daya_tampung = $request->dayaTampung;
            $data->ikut_seleksi = $request->ikutSeleksi;
            $data->lulus_seleksi = $request->lulusSeleksi;
            $data->mhsbr_bukan_transfer = $request->bukanTransfer;
            $data->mhsbr_transfer = $request->transfer;
            $data->total_mhs_bknTransfer = $request->totalBknTransfer;
            $data->total_mhs_transfer = $request->totalTransfer;
            $data->lulusan_bkn_transfer = $request->lulusBknTransfer;
            $data->lulusan_transfer = $request->lulusTransfer;
            $data->ipk_reg_min = $request->ipkmin;
            $data->ipk_reg_rat = $request->ipkrat;
            $data->ipk_reg_mak = $request->ipkmak;
            $data->jumlah_mahasiswa_wna = $request->jumlahWNA;
            $data->save();

            return redirect()->route('mahasiswa.lulusan.view');
        }

        else {
            $data = new MahasiswaDanLulusan();
            $data->tahun_akademik = $request->tahunAkademik;
            $data->daya_tampung = $request->dayaTampung;
            $data->ikut_seleksi = $request->ikutSeleksi;
            $data->lulus_seleksi = $request->lulusSeleksi;
            $data->mhsbr_bukan_transfer = $request->bukanTransfer;
            $data->mhsbr_transfer = $request->transfer;
            $data->total_mhs_bknTransfer = $request->totalBknTransfer;
            $data->total_mhs_transfer = $request->totalTransfer;
            $data->lulusan_bkn_transfer = $request->lulusBknTransfer;
            $data->lulusan_transfer = $request->lulusTransfer;
            $data->ipk_reg_min = $request->ipkmin;
            $data->ipk_reg_rat = $request->ipkrat;
            $data->ipk_reg_mak = $request->ipkmak;
            $data->jumlah_mahasiswa_wna = $request->jumlahWNA;

            $data->save();
            return redirect()->route('mahasiswa.lulusan.view');
        }
    }

    public function formUpdateLulusanMhs($id)
    {
        $years = array();
        $time = new \DateTime('now');
        $newtime = $time->modify('-0 year' )->format('Y');
        $newtime1= $time->modify('-1 year' )->format('Y');
        $newtime2= $time->modify('-1 year' )->format('Y');
        $newtime3= $time->modify('-1 year' )->format('Y');
        $newtime4= $time->modify('-1 year' )->format('Y');
        $years[0] = $newtime;
        $years[1] = $newtime1;
        $years[2] = $newtime2;
        $years[3] = $newtime3;
        $years[4] = $newtime4;
        $data = MahasiswaDanLulusan::find($id);
        return view('pages.mahasiswa.mhsDanLulusanFormUpdate')->withYears($years)->withData($data);
    }

    public function updateLulusanMhs(Request $request,$id)
    {
        $this->validate($request,array(
            'tahunAkademik' => 'required|numeric',
            'dayaTampung' => 'required|numeric',
            'ikutSeleksi' => 'required|numeric',
            'lulusSeleksi' => 'required|numeric',
            'bukanTransfer'=>'required|numeric',
            'transfer'=>'required|numeric',
            'totalBknTransfer' => 'required|numeric',
            'totalTransfer' => 'required|numeric',
            'lulusBknTransfer' => 'required|numeric',
            'lulusTransfer' => 'required|numeric',
            'ipkmin' => 'required|numeric',
            'ipkmak' => 'required|numeric',
            'ipkrat' => 'required|numeric',
            'jumlahWNA' => 'required|numeric',
        ));
            $data = MahasiswaDanLulusan::find($id);
            $data->tahun_akademik = $request->tahunAkademik;
            $data->daya_tampung = $request->dayaTampung;
            $data->ikut_seleksi = $request->ikutSeleksi;
            $data->lulus_seleksi = $request->lulusSeleksi;
            $data->mhsbr_bukan_transfer = $request->bukanTransfer;
            $data->mhsbr_transfer = $request->transfer;
            $data->total_mhs_bknTransfer = $request->totalBknTransfer;
            $data->total_mhs_transfer = $request->totalTransfer;
            $data->lulusan_bkn_transfer = $request->lulusBknTransfer;
            $data->lulusan_transfer = $request->lulusTransfer;
            $data->ipk_reg_min = $request->ipkmin;
            $data->ipk_reg_rat = $request->ipkrat;
            $data->ipk_reg_mak = $request->ipkmak;
            $data->jumlah_mahasiswa_wna = $request->jumlahWNA;

            $data->save();
            return redirect()->route('mahasiswa.lulusan.view');
    }

    public function deleteLulusanMhs($id)
    {
        $data = MahasiswaDanLulusan::find($id);
        $data->delete();
        return redirect()->route('mahasiswa.lulusan.view');
    }

    //mahasiswa dan dana section

    public function viewAllDanaMhs()
    {
        $datas = MahasiswaDanDana::all();
        return view('pages.mahasiswa.mhsDanDanaView')->withDatas($datas);
    }

    public function formDanaMhs()
    {
        $years = array();
        $time = new \DateTime('now');
        $newtime = $time->modify('-0 year' )->format('Y');
        $newtime1= $time->modify('-1 year' )->format('Y');
        $newtime2= $time->modify('-1 year' )->format('Y');
        $years[0] = $newtime;
        $years[1] = $newtime1;
        $years[2] = $newtime2;

        return view('pages.mahasiswa.mhsDanDanaForm')->withYears($years);
    }

    public function storeDanaMhs(Request $request)
    {
      $existTahun = MahasiswaDanDana::where('tahun_akademik','=',$request->tahunAkademik)->exists();
      if($existTahun){
          return redirect()->route('mahasiswa.dana.view')->with('status', 'Tahun akademik sudah ada!');
      }
        $this->validate($request,array(
            'tahunAkademik'   => 'required|numeric',
            'jumlahMahasiswa' => 'required|numeric',
            'jumlahDana'      => 'required|numeric',
        ));

        $data = new MahasiswaDanDana();
        $data->tahun_akademik = $request->tahunAkademik;
        $data->jumlah_mahasiswa = $request->jumlahMahasiswa;
        $data->jumlah_dana = $request->jumlahDana;
        $data->save();

        return redirect()->route('mahasiswa.dana.view');
    }

    public function formUpdateDanaMhs($id)
    {
        $data = MahasiswaDanDana::find($id);
        return view('pages.mahasiswa.mhsDanDanaFormUpdate')->withData($data);
    }

    public function updateDanaMhs(Request $request,$id)
    {
        $this->validate($request,array(
            'tahunAkademik'    => 'required|numeric',
            'jumlahMahasiswa'  => 'required|numeric',
            'jumlahDana'       => 'required|numeric',
        ));

        $data = MahasiswaDanDana::find($id);
        $data->tahun_akademik = $request->tahunAkademik;
        $data->jumlah_mahasiswa = $request->jumlahMahasiswa;
        $data->jumlah_dana = $request->jumlahDana;
        $data->save();

        return redirect()->route('mahasiswa.dana.view');
    }

    public function deleteDanaMhs($id)
    {
        $data = MahasiswaDanDana::find($id);
        $data->delete();
        return redirect()->route('mahasiswa.dana.view');
    }

    //Evaluasi Lulusan Section

    public function formEvaLulusan()
    {
        $kemampuans = JenisKemampuan::all();
        return view('pages.mahasiswa.evaluasiLulusanForm')->withKemampuans($kemampuans);
    }

    public function viewEvaLulusan()
    {
        $datas = EvaluasiLulusan::all();
        $datalanjutans = EvaluasiLanjutan::find(1);
        return view('pages.mahasiswa.evaluasiLulusanView')->withDatas($datas)->withDatalanjutans($datalanjutans);
    }

    public function storeEvaLulusan(Request $request)
    {
        $this->validate($request,array(
            'jenisKemampuan' => 'required|max:255',
            'sgtBaik'        => 'required|numeric',
            'baik'           => 'required|numeric',
            'cukup'          => 'required|numeric',
            'kurang'         => 'required|numeric',
        ));

        $id = EvaluasiLulusan::where('jenis_kemampuan_id',$request->jenisKemampuan)->get(['id'])->toArray();
        if($id != null)
        {
            $x = EvaluasiLulusan::find($id[0]["id"]);
            $x->jenis_kemampuan_id = $request->jenisKemampuan;
            $x->sangat_baik = $request->sgtBaik;
            $x->baik = $request->baik;
            $x->cukup = $request->cukup;
            $x->kurang = $request->kurang;
            $x->pelacakan = $request->pelacakan;
            $x->save();

            if (isset($request->persentase) || isset($request->waktuTgu)) {
                $dataLanjutan = EvaluasiLanjutan::find(1);
                $dataLanjutan->persentase = $request->persentase;
                $dataLanjutan->waktu_tunggu = $request->waktuTgu;
                $dataLanjutan->save();
            }

            return redirect()->route('evaluasi.lulusan.view');
        }

        else {
            $data = new EvaluasiLulusan();
            $data->jenis_kemampuan_id = $request->jenisKemampuan;
            $data->sangat_baik = $request->sgtBaik;
            $data->baik = $request->baik;
            $data->cukup = $request->cukup;
            $data->kurang = $request->kurang;
            $data->pelacakan = $request->pelacakan;
            $data->save();

            if (isset($request->persentase) || isset($request->waktuTgu)) {
                $dataLanjutan = EvaluasiLanjutan::find(1);
                $dataLanjutan->persentase = $request->persentase;
                $dataLanjutan->waktu_tunggu = $request->waktuTgu;
                $dataLanjutan->save();
            }
        }
        return redirect()->route('evaluasi.lulusan.view');
    }

    public function formUpdateEvaLulusan($id)
    {
        $data      = EvaluasiLulusan::find($id);
        $lanjutans = EvaluasiLanjutan::find(1);
        return view('pages.mahasiswa.evaluasiLulusanFormUpdate')->withData($data)->withLanjutans($lanjutans);
    }

    public function updateEvaLulusan(Request $request,$id)
    {
        $this->validate($request,array(
            'jenisKemampuan' => 'required|max:255',
            'sgtBaik'        => 'required|numeric',
            'baik'           => 'required|numeric',
            'cukup'          => 'required|numeric',
            'kurang'         => 'required|numeric',
        ));

        $data = EvaluasiLulusan::find($id);
        $data->jenis_kemampuan_id = $request->jenisKemampuan;
        $data->sangat_baik = $request->sgtBaik;
        $data->baik = $request->baik;
        $data->cukup = $request->cukup;
        $data->kurang = $request->kurang;
        $data->pelacakan = $request->pelacakan;
        $data->save();

        if(isset($request->persentase)||isset($request->waktuTgu))
        {
            $dataLanjutan = EvaluasiLanjutan::find(1);
            $dataLanjutan->persentase = $request->persentase;
            $dataLanjutan->waktu_tunggu = $request->waktuTgu;
            $dataLanjutan->save();
        }

        return redirect()->route('evaluasi.lulusan.view');
    }

    public function deleteEvaLulusan($id)
    {
        $data = EvaluasiLulusan::find($id);
        $data->delete();
        return redirect()->route('evaluasi.lulusan.view');
    }

    #ALUMNI SECTION

    public function alumniView()
    {
        $datas = Alumni::all();
        return view('pages.mahasiswa.adminAlumniView')->withDatas($datas);
    }

    public function alumniForm()
    {
        return view('pages.mahasiswa.adminAlumniForm');
    }

    public function storeAlumni(Request $request)
    {
        $this->validate($request,array(
            'nama'          => 'required|max:255',
            'judulTesis'    => 'required|max:255',
            'tahun'         => 'required|numeric',
            'instansiKerja' => 'required|max:255',
        ));
        $data = new Alumni();
        $data->nama = $request->nama;
        $data->judul_tesis = $request->judulTesis;
        $data->tahun_lulus = $request->tahun;
        $data->instansi_kerja_terakhir = $request->instansiKerja;
        $data->save();
        //return "berhasil";
        return redirect()->route('admin.alumni.view');
    }

    public function alumniFormUpdate($id)
    {
        $data = Alumni::find($id);
        return view('pages.mahasiswa.adminAlumniUpdate')->withData($data);
    }

    public function alumniUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'nama'          => 'required|max:255',
            'judulTesis'    => 'required|max:255',
            'tahun'         => 'required|numeric',
            'instansiKerja' => 'required|max:255',
        ));
        $data = Alumni::find($id);
        $data->nama = $request->nama;
        $data->judul_tesis = $request->judulTesis;
        $data->tahun_lulus = $request->tahun;
        $data->instansi_kerja_terakhir = $request->instansiKerja;
        $data->save();
        return redirect()->route('admin.alumni.view');
    }

    public function alumniDelete($id)
    {
        $data = Alumni::find($id);
        $data->delete();
        return redirect()->route('admin.alumni.view');
    }

}
