@extends('layouts.navbar2')
@section('middle')
<!-- Middle Column -->
 <script src="{{url('/jquery-3.2.1.min.js')}}"></script>
<div class="w3-col m7">
  @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <!-- <img src="/w3images/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"> -->
    <span class="w3-right w3-opacity">{{$row->updated_at}}</span>
    <h4>{{$row->user->name}}</h4>
    <hr class="w3-clear">
    <p>{{$row->jenisHewan}}</p>
  <img src="{{url('img/ternak/ternak'.$row->id_ternak)}}.jpg" alt="-" class="w3-col">
  <table>
    <tr>
    <td>
    
        <h1> Harga : {{$row->harga}} </h1>
      
    </td>
      <td>
        <h1> Bobot : {{$row->bobot}}</h1>
      </td>
      <td>
        <h1> Umur : {{$row->umur}}</h1>
      </td>
      <td>
        <h1>
          Lokasi : {{$row->lokasi}}
        </h1>
      </td>
    </tr>
    <tr>
    
      <tr>
        <h1>
      Deskripsi : {{$row->deskripsi}}
    </h1>
      </tr>
      <tr>
        Biaya Pakan : {{$row->biayapakan}}
      </tr>
      <tr>
        Biaya Perawatan : {{$row->biayaperawatan}}
      </tr>
    </td>
  </table>
  
    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">
            <form action="{{url('investor/pengajuan/'.$row->id_ternak.'/tambah')}}" method="post" accept-charset="utf-8">
              {{csrf_field()}}
                 <label for="jangkawaktu" onclick="setData();" style="width: 100px;">Jangka Waktu : </label>
                   <select name="jangkawaktu" id="jangkawaktu" onclick="setData();" style="margin-top: 20px;" class="form-control">
                                <option value="3bulan">3 bulan</option>
                                <option value="6bulan">6 bulan</option>
                            </select>
                            <br>

              <label for="hargapakan"  style="width: 100px;">Harga Pakan : </label>
               <div id="pakan3bulan">
                        <label>3.000.000</label>
                      
                    </div>

                    <div id="pakan6bulan">
                        <label>6.000.000</label>
                        
                    </div>

                 
                 <br>
                 <label for="hargarawat"  style="width: 100px;">Perawatan : </label>
                 <div id="rawat3bulan">
                        <label>400.000</label>
                      
                    </div>

                    <div id="rawat6bulan">
                        <label>Rp. 800000</label>
                        
                    </div>
                     <label for="hargaasuransi"  style="width: 100px;">Asuransi: </label>
                 <div id="asuransi3bulan">
                        <label>Rp. 500000</label>
                      
                    </div>

                    <div id="asuransi6bulan">
                        <label>Rp. 1000000</label>
                        
                    </div>
                     <label for="hargatot"  style="width: 100px;">Total : </label>
                 <div id="hargatot3bulan">
                 @foreach($hitung3bulan as $total)
                        <label>Rp . {{$total->harga+400000+3000000+500000}}</label>
                     
                    </div>

                    <div id="hargatot6bulan">
                        <label>Rp. {{$total->harga+800000+6000000+100000}}</label>
                        
                    </div>
                     @endforeach

                       
              <button type="submit" id="ajukan" class="w3-button w3-theme" onclick="setAjukan()"><i class="fa fa-pencil"></i>Ajukan</button> 
            </form>
          </div>
        </div>
      </div>
    </div>
  
  </div> 
  
@endforeach
  <!-- End Middle Column -->
</div>
  
<script>
        $(document).ready(function(){
            setData();
        })
        function setData(){
            var a = $('#jangkawaktu').val();
            if (a == '3bulan') {
                $('#pakan3bulan').show();
               $('#rawat3bulan').show();
               $('#rawat6bulan').hide();
                $('#pakan6bulan').hide();
                $('#asuransi3bulan').show();
                $('#hargatot3bulan').show();
                $('#hargatot6bulan').hide();
                $('#asuransi6bulan').hide();
            }else{
                $('#pakan3bulan').hide();
              $('#rawat3bulan').hide();
              $('#rawat6bulan').show();
                $('#pakan6bulan').show();
                $('#asuransi6bulan').show();
                $('#asuransi3bulan').hide();
                $('#hargatot6bulan').show();
                $('#hargatot3bulan').hide();
            }
        }
        function setAjukan(){
            @foreach($data as $row)
             @foreach($datapengajuan as $dp)
              @if($row->id_ternak == $dp->id_ternak)
              $('#ajukan').hide();
              @else
               $('#ajukan').show();

           @endif
               @endforeach
               @endforeach
        }
    </script>
@endsection



