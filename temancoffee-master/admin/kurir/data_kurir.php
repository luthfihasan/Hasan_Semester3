	<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>
				No 
			</th>
			<th>
				Nama Kurir
			</th>
			<th>
				Biaya Kurir
			</th>
			<th>
				Waktu Pengiriman
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
				$data = mysqli_query ($koneksi, " select *	from kurir order by id_kurir desc");
				while ($row = mysqli_fetch_array ($data))
				{
			?>
		<tr>
			<td>
				<?php echo $no++; ?>
			</td>
			<td>
				<?php echo $row['nama_kurir']; ?>
			</td>
			<td>
				<?php echo $row['biaya_kurir']; ?>
			</td>
			<td>
				<?php echo $row['waktu_pengiriman']; ?>
			</td>
			<td>
				<a href="#" class="btn btn-primary" id="edit" data-id="<?php echo $row['id_kurir']; ?>">Edit</a> |
				<button type="button" id="confirm_delete" class="btn btn-danger" data-id="<?php echo $row['id_kurir']; ?>">Delete</button>  
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