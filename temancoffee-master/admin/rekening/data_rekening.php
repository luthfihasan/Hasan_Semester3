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
				No Rek
			</th>
			<th>
				Atas Nama
			</th>
			<th>
				Logo Bank
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
				$data = mysqli_query ($koneksi, " select *	from rekening order by id_rekening desc");
				while ($row = mysqli_fetch_array ($data))
				{
			?>
		<tr>
			<td>
				<?php echo $no++; ?>
			</td>
			<td>
				<?php echo $row['nama_bank']; ?>
			</td>
			<td>
				<?php echo $row['no_rek']; ?>
			</td>
			<td>
				<?php echo $row['atas_nama']; ?>
			</td>
			<td>
				<img src="../../assets/img/<?php echo $row['logo_bank']; ?>" width="100px" height="100px">
			</td>
			<td>
				<a href="#" class="btn btn-primary" id="edit" data-id="<?php echo $row['id_rekening']; ?>">Edit</a> |
				<button type="button" id="confirm_delete" class="btn btn-danger" data-id="<?php echo $row['id_rekening']; ?>">Delete</button>  
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