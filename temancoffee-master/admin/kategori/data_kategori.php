	<table class="table table-bordered" id="table">
		<thead>
			<tr>
				<th>
					No 
				</th>
				<th>
					kategori 
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
			$data = mysqli_query ($koneksi, " select *	from kategori order by id_kategori desc");
			while ($row = mysqli_fetch_array ($data))
			{
				?>
				<tr>
					<td>
						<?php echo $no++; ?>
					</td>
					<td>
						<?php echo $row['kategori']; ?>
					</td>
					<td>
						<a href="#" class="btn btn-primary" id="edit" data-id="<?php echo $row['id_kategori']; ?>">Edit</a> |
						<button type="button" id="confirm_delete" class="btn btn-danger" data-id="<?php echo $row['id_kategori']; ?>">Delete</button>  
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