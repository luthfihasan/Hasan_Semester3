	<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>
				No 
			</th>
			<th>
				Nama 
			</th>
			<th>
				Harga
			</th>
			<th>
				Descripsion
			</th>
			<th>
				Stok
			</th>
			<th>
				Kategori
			</th>
			<th>
				Gambar
			</th>
			<th>
				Opsi
			</th>
		</tr>
		</thead>
		<tbody>
			<?php
				include"../../koneksi.php";
				$no = 1;
				$data = mysqli_query ($koneksi, " select *	from product order by id_product desc");
				while ($row = mysqli_fetch_array ($data))
				{
			?>
		<tr>
			<td>
				<?php echo $no++; ?>
			</td>
			<td>
				<?php echo $row['nama_product']; ?>
			</td>
			<td>
				Rp.<?php echo number_format($row['harga']); ?>
			</td>
			<td>
				<?php echo substr($row['description'],0,40); ?>...
			</td>
			<td>
				<?php echo $row['stok']; ?>
			</td>
			<td>
				<?php echo $row['kategori']; ?>
			</td>
			<td>
				<img src="../../assets/product/<?php echo $row['gambar']; ?>" width="100px" height="100px">
			</td>
			<td>
				<a href="#" class="btn btn-primary" id="edit" data-id="<?php echo $row['id_product']; ?>">Edit</a> |
				<button type="button" id="confirm_delete" class="btn btn-danger" data-id="<?php echo $row['id_product']; ?>">Delete</button>  
			</td>
		</tr>
		<?php
			}
		?>
		</tbody>
	</table>

	<script src="../docs/js/plugins/jquery.dataTables.min.js"></script>
	<script src="../docs/js/plugins/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">$('#table').DataTable();</script>