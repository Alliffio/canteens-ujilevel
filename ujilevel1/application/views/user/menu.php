    <div class="bg-light py-3">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
    					class="text-black">Menu Masakan</strong></div>
    		</div>
    	</div>
    </div>
    <br>
    <br>
    <div class="container">
    	<div class="row">
      <div class="col-xl-7 col-lg-6">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID Makanan</th>
											<th>Nama Makanan</th>
											<th>Harga</th>
											<th>Status Makanan</th>
											<th>Foto</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php 
                          foreach ($masakan as $datas)
                          {
                      ?>
											<td><?php echo $datas->id_masakan;?></td>
											<td><?php echo $datas->nama_masakan;?></td>
											<td><?php echo $datas->harga;?></td>
											<td><?php echo $datas->status_masakan;?></td>
											<td><img src="<?php echo base_url(); ?>assets/foto/<?php echo $datas->foto;?>" width="90px"></td>
											<td>
                      <button class="d-none d-sm-inline-block btn btn-sm btn-outline-danger shadow-sm" onclick="buyproduct('<?php echo $datas->id_masakan?>', '<?php echo $datas->nama_masakan?>', '<?php echo $datas->harga?>', '<?php echo $datas->foto?>')">
                          <i class="fas fa-trash fa-sm text-white-50"></i> SHOP NOW</button>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
    	
      
      </div>
      <div class="col-xl-5 col-lg-6">
      <div class="card shadow mb-4">
	<form method="POST" action="<?php echo site_url('Transaksi/inputOrder'); ?>" enctype="multipart/form-data">
		<div class="card-header py-3 text-center">
			<div class="m-0 font-weight-bold text-primary text-center" id="currency"></div>
            <h6>Total</h6>
            <input type="text" readonly
				class="m-0 font-weight-bold text-primary text-center" id="heading-cart" value="Cart" name="total_price">
		</div>
        <div class="card-body">
			<div class="card card-7">
				<div class="card-body">
					<div class="value">
						<div class="input-group">
							<input class="input--style-5" type="text" name="id_user"
								placeholder="ID User" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="card card-7">
				<div class="card-body">
					<div class="form-col" id="cart-section">
					</div>
					<div class="text-center mt-2">
						<a class="btn btn--radius-2 btn-primary btn-block btn-md" onclick="showprice()"
							style="text-decoration: none; color: white;">
							Total
						</a>
					</div>
					<div class="text-center mt-2">
						<button class="btn btn--radius-2 btn-success btn-block btn-md" type="submit">
							Checkout
						</button>
					</div>
					<div class="text-center mt-2">
						<a class="btn btn--radius-2 btn-danger btn-block btn-md" onclick="clearArray()"
							style="text-decoration: none; color: white;">
							Clear
						</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
      </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    	integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script>
    let harga = 0
    let trolley = []

    function buyproduct(id, name, price, image) {
        for (let i = 0; i < trolley.length; i++) {
            if (name == trolley[i][0]) {
                trolley[i][3] += 1
                showcart()
                return
            }
        }
        let pushData = [name, Number(price), image, 1, id]
        trolley.push(pushData)
        showcart()
    }

    function showcart() {
        $('#cart-section').html("")
        trolley.forEach(data => {
            const itemLayout = `
        <div class="media mb-3">
            <img src="<?php echo base_url('assets/foto/');?>${data[2]}" class="mr-3" width="70">
            <div class="media-body">
            <input type="text" readonly value="${data[4]}" class="mt-0 font-weight-bold" name="product_id[]" hidden>
            <input type="text" readonly value="${data[0]}" class="mt-0 font-weight-bold" name="product_name[]">
            <span style="float: left;" class="mt-1"><input type="number" class="quantity" value="${data[3]}" name="product_qty[]"></span>
            <input type="text" readonly value="Rp.${data[1]}" id="cart-price" class="cart-price mt-2" name="product_price[]">
            </div>    
            <button class="btn btn-sm btn-danger ml-2" id="deleteItem">x</button>
        </div>
        `
            $('#cart-section').append(itemLayout)
        })
    }

    function showprice() {
        trolley.forEach(data => {
            harga += data[1] * data[3]
            $('#heading-cart').val(harga)
        })
    }

    function clearArray() {
        while (trolley.length > 0) {
            trolley.pop()
        }
        showcart()
        $('#heading-cart').val("Cart")
    }
</script>