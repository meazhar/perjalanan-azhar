  @extends('layouts.index')
  @section('content')
    <div class="content-wrapper">
        <section class="content">
            <section class="content-header">
                <div class="card">
                     <div class="card-header">
                       <h3>Simulasi Transaksi Barang</h3>
                     </div>

                     <div class="card-body">
                     <form id="form-pegawai">
                       <div class="form-group row">
                         <label for="id" class="col-sm-4 col-form-label">ID Karyawan</label>
                         <div class="col-sm-8">
                           <input type="text" class="form-control" id="id" name="id" autofocus>
                         </div>
                       </div>

                       <div class="form-group row">
                        <label for="namabarang" class="col-sm-4 col-form-label">Nama Barang</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="namabarang" name="namabarang" autofocus>
                        </div>
                      </div>

                       <div class="form-group row">
                         <label for="jmlBarang" class="col-sm-4 col-form-label">Jumlah Barang</label>
                         <div class="col-sm-8">
                           <input type="text" class="form-control" id="jmlBarang" name="jmlBarang" autofocus>
                         </div>
                       </div>


                       <div class="form-group row">
                         <label for="tglBeli" class="col-sm-4 col-form-label">Tanggal Beli</label>
                         <div class="col-sm-8">
                           <input type="date" class="form-control" id="tglBeli" name="tglBeli" autofocus>
                         </div>
                       </div>


                       <div class="form-group row">
                         <label for="hrgBarang" class="col-sm-4 col-form-label">Harga Barang</label>
                         <div class="col-sm-8">
                           <input type="text" class="form-control" id="hrgBarang" name="hrgBarang" autofocus>
                         </div>
                       </div>

                       <div class="form-group row">
                         <label for="jp" class="col-sm-4 col-form-label">Jenis Pembayaran</label>
                         <div class="col-sm-8">
                           <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="jp" id="jpc" value="C">
                             <label class="form-check-label" for="jpc">Cash</label>
                           </div>

                           <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="jp" id="jpe" value="P">
                             <label class="form-check-label" for="jpe">e-money/transfer</label>
                           </div>
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="nama-produk" class="col-sm-4 col-form-label"></label>
                         <div class="col-sm-2">
                           <button class="form-control btn btn-primary" type="button" id="btn-insert">Submit</button>
                       </div>
                       </div>
                       </form>
                     </div>
                   </div>

                   <div class="card">
                     <div class="card-header">
                       <h3>Data Transaksi Barang</h3>
                     </div>
                     <div class="card-body">
                     <div class="my-2">
                         <div class="form-group row mt-2">
                           <div class="col-sm-7">
                              <button class="btn btn-success" type="button" id="btn-sorting">Urutkan</button>
                           </div>
                           <div class="col-sm-4">
                             <input type="search" class="form-control" id="teks-cari">
                           </div>
                           <div class="col-sm-1">
                             <button id="btn-search" type="button" class="btn btn-secondary btn-block">Cari</button>
                           </div>
                       </div>
                     <table class="table table-compact table-bordered table-hover" id="data-pegawai">
                           <thead>
                              <tr>
                                 <th>id</th>
                                 <th>Tanggal Beli</th>
                                 <th>Nama Barang</th>
                                 <th>Harga</th>
                                 <th>Qty</th>
                                 <th>Diskon</th>
                                 <th>Total Harga</th>
                                 <th>Jenis Bayar</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              <tr>
                        </table>
                     </div>
                   </div>

                 </section>
        </section>
    </div>
  @endsection

  @push('js')
  <script>
  function insertData(){
    const data = $('#formCucian').serializeArray()
    // console.log(data)
    let newData = {}

    data.forEach(function(item, index){
      let name = item['name']
      let value = name === 'id' || name == 'berat'  ? Number(item['value']) : item['value']
      newData[name] = value
    })
    console.log(newData)

    localStorage.setItem('dataCucian', JSON.stringify([...dataCucian, newData]))
    return newData
  }

  let dataCucian = JSON.parse(localStorage.getItem('dataCucian')) || []
  $('#data-cucian tbody').html(showData(dataCucian))
      // console.log(dataCucian)

    function showData(arr){
      let row = ''
      // console.log(arr.length)
      if(arr.length == 0){
        return row = `<tr><td colspan="8" align="center">Belum ada data</td></tr>`
      }
      let jmlBerat = jmlDiskon = jmlTotal = 0
      arr.forEach(function(item, index){
        // console.log(item)
        let harga = item['jenisCucian'] == 'Standar' ? 7500 : 10000
        let jmlHarga = harga * item['berat']
        let diskon = jmlHarga >= 50000 ? harga * 0.1 : 0
        let total = jmlHarga - diskon

        jmlBerat += item['berat']
        jmlDiskon += diskon
        jmlTotal += total

        row += `<tr>`
        row += `<td>${item['id']}</td>`
        row += `<td>${item['notelp']}</td>`
        row += `<td>${item['jenisCucian']}</td>`
        row += `<td>${item['namaPelanggan']}</td>`
        row += `<td>${item['tgl_cuci']}</td>`
        row += `<td>${item['berat']}</td>`
        row += `<td>${diskon}</td>`
        row += `<td>${total}</td>`
        row += `</tr>`
      })

        row += `<tr style="font-weight:bold; background:#000;color:white">`
        row += `<td colspan="5">Jumlah Total</td>`
        row += `<td>${jmlBerat}</td>`
        row += `<td>${jmlDiskon}</td>`
        row += `<td>${jmlTotal}</td>`
        row += `</tr>`

      return row
    }

    //event klik input data
    $('#btnSimpan').on('click', function(e){
      e.preventDefault()
      console.log(dataCucian)
      dataCucian.push(insertData(dataCucian))
      $('#data-cucian tbody').html(showData(dataCucian))
    })

    function sorting(arr, key){
      let i, j, id, value;
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

    //event klik sorting
    $('#btn-sorting').on('click', function(){
      dataCucian = sorting(dataCucian, 'id')
      localStorage.setItem('dataCucian', JSON.stringify(dataCucian))
      $('#data-cucian tbody').html(showData(dataCucian))
    })

    function searching(arr, key, teks){
      for(let = i= 0; i < arr.length; i++){
        if(arr[i][key] == teks)
        return i
      }
      return -1
    }

    //event klik search
    $('#btn-search').on('click', function(){
      let teksSearch = $('#teks-cari').val()
      console.log(dataCucian)
      let id = searching(dataCucian, 'id', teksSearch)
      let data = []
      if(id >= 0)
        data.push(dataCucian[id])
      console.log(id)
      console.log(data)
      $('#data-cucian tbody').html(showData(data))
    })
  </script>
@endpush
