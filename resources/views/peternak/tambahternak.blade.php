  @extends('layouts.navbarternak')
  @section('middle')
  <!-- Middle Column -->
  <div class="w3-col m7">
    
    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">
            <form action="{{url('peternak/tambahternak/tambah')}}" method="post"  enctype="multipart/form-data">
              {{csrf_field()}}
              <h6 class="w3-opacity">Tambah Hewan</h6>
              <hr class="w3-clear">
              <label for="file"  style="width: 100px;">Gambar: </label>
              <input type="file" name="file" id="file" class="w3-rest w3-border" accept=".jpg">
              <br>
              <label for="jenisHewan"  style="width: 100px;">Jenis Hewan : </label>
             <select name="jenisHewan" id="jenisHewan" style="margin-top: 20px;" class="form-control">
              <option value="sapi perah dewasa">Sapi Perah Dewasa</option>
              <option value="sapi bali dewasa">Sapi Bali Dewasa</option>
              <option value="sapi simental dewasa">Sapi Simental Dewasa</option>
              </select>
              <br>
              <label for="harga"  style="width: 100px;">Harga : </label>
              <input type="text" name="harga" id="harga" class="w3-rest w3-border" required>
              <br>
                <label for="bobot"  style="width: 100px;">Bobot (kg) : </label>
              <input type="text" name="bobot" id="bobot" class="w3-rest w3-border" required>
              <br>

               <label for="umur"  style="width: 100px;">Umur (bulan) : </label>
              <input type="text" name="umur" id="umur" class="w3-rest w3-border" required>
              <br>
              <label for="lokasi"  style="width: 100px;">Lokasi </label>
              <br>

              <textarea  name="lokasi" contenteditable="true" class="w3-border w3-padding w3-col" required></textarea>
              <br>
              <label for="deskripsi"  style="width: 100px;">Deskripsi </label>
              <br>S
              <textarea  name="deskripsi" contenteditable="true" class="w3-border w3-padding w3-col" required></textarea>
               <br>
             
              <hr class="w3-clear">
              <button type="submit" class="w3-button w3-theme w3-col"><i class="fa fa-pencil"></i>Tambah Hewan </button> 
            </form>
          </div>
        </div>
      </div>
    </div>
   
   <!--  -->
    <!-- End Middle Column -->
  </div>
  @if(Auth::user()->status == 'Komunitas')
  <script src="{{url('js/external/jquery/jquery.js')}}"></script>
  <script>
    $(document).ready(function(){
      @if(isset($_GET['kategori']))
      $('#btn_komunitas').attr('href','{{url(Auth::user()->status."/home")}}?region=Komunitas&kategori={{$_GET["kategori"]}}');
      $('#btn_nasional').attr('href','{{url(Auth::user()->status."/home")}}?region=Nasional&kategori={{$_GET["kategori"]}}');
      @else 
      $('#btn_komunitas').attr('href','{{url(Auth::user()->status."/home")}}?region=Komunitas');
      $('#btn_nasional').attr('href','{{url(Auth::user()->status."/home")}}?region=Nasional');
      @endif
    });
  </script>
  @endif
  @endsection


F
