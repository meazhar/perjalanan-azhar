@extends('layouts.index')
@section('content')
<section class="content">

    @include('cucian.form')

    <div class="card">
    <div class="card-header">
        <h3>Data Cucian</h3>
    </div>
<div class="card-body">
    <div class="mt-2 mb-2">
        <div class="form-group row mt-2">
          <div class="col-sm-2">
             <button class="btn btn-success" type="button" id="sorting">Sorting</button>
          </div>
          <div class="col-sm-4">
            <input type="search" class="form-control" id="search">
          </div>
          <div class="col-sm-2">
            <button id="btn-search" class="btn btn-secondary">Cari</button>
          </div>
      </div>
    <table class="table table-compact table-stripped table-bordered" id="tblCucian">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>No. HP/WA</th>
                <th>Tanggal Cucian</th>
                <th>Jenis Cucian</th>
                <th>Berat</th>
                <th>Diskon</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="10" align="center">Belum ada data</td>
            </tr>
        </tbody>
    </table>
</div>
<!--end of data -->

  </section>
@endsection
@push('scripts')
<script>
function insertData(){
  const data = $('#form-cucian').serializeArray()
  // console.log(data)

  let newData = {}
  data.forEach(function(item, index){
    let name = item['name']
    let value = name === 'id' || name == 'berat' ? Number(item['value']) : item['value']
    newData[name] = value
  })
  console.log(newData)

  localStorage.setItem('dataCucian', JSON.stringify([...dataCucian, newData]))
  return newData
}

let dataCucian = JSON.parse(localStorage.getItem('dataCucian')) || []
$('#tblCucian tbody').html(showData(dataCucian))


function showData(arr){
  let row = ''

  if(arr.length == 0){
    return row = `<tr><td colspan="6" align="center">Belum ada data</td></tr>`
  }

  let jmlBerat = jmlDiskon = jmlTotal = 0
  arr.forEach(function(item, index){
    let harga = item['jc'] == 'Standar' ? 7500 : 10000
    let jmlHarga = harga * item['berat']
    let diskon = jmlHarga >= 50000 ? harga * 0.1 : 0
    let total = jmlHarga - diskon

    jmlBerat += item['berat']
    jmlDiskon += diskon
    jmlTotal += total

    row += `<tr>`
    row += `<td>${item['id']}</td>`
    row += `<td>${item['nama']}</td>`
    row += `<td>${item['nophone']}</td>`
    row += `<td>${item['tanggal']}</td>`
    row += `<td>${item['jenisCucian']}</td>`
    row += `<td>${item['berat']}</td>`
    row += `<td>${diskon}</td>`
    row += `<td>${total}</td>`
    row += `</tr>`
  })

    row += '<tr style="font-weight:bold;background:#000;color:white">'
    row += `<td colspan="5">Jumlah Total</td>`
    row += `<td>${jmlBerat}</td>`
    row += `<td>${jmlDiskon}</td>`
    row += `<td>${jmlTotal}</td>`
    row += '</tr>'

  return row
}

// events input data
$('#btn-insert').on('click',function(e){
        e.preventDefault()
        dataCucian.push(insertData(dataCucian))
        $('#tblCucian').html(showData(dataCucian))
      })

      function sorting(arr,key){
      let i,  j, id, value;
      for (i = 1; i < arr.length; i++)
      {
          value = arr[i];
          id = arr[i][key]
          j = i - 1;
          while (j >= 0 && arr[j][key] > id)
          {
              arr[j + 1] = arr[j];
              j = j - 1;
          }
          arr[j + 1] = value;
      }
      return arr
    }

    //events sorting
    $('#sorting').on('click',function(){
        dataCucian = sorting(dataCucian, 'id')
        localStorage.setItem('dataCucian', JSON.stringify(dataCucian))
        $('#tblCucian').html(showData(dataCucian))
    })

    function searching(arr, key, teks){
        for(let i= 0; i < arr.length; i++){
            if(arr[i][key] == teks)
            return i
        }
        return -1
    }

    //events searching
    $('#btn-search').on('click', function(e){
            let teskSearch = $('#search').val()
            let id = searching(dataCucian, 'id', teskSearch)
            let data = []
            if(id >= 0)
            data.push(dataCucian[id])
            console.log(id)
            console.log(data)
            $('#tblCucian').html(showData(data))
     })
    //end of events
</script>
@endpush
