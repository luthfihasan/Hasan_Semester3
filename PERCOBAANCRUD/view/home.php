<!-- header -->
<?php include "../header.php"?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-zicons@1.3.0/font/bootstrap-icons.css">

<div class="contain>Icon</th>
                <th scope="col">Judul</th>
                <th scope="col">Link</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>

    <tbody>
        <tr>
            <?php
            $query = "SELECT * FROM survei";//SQL query to fecth all  table daa
            $view_survei = mysqli_query($conn, $query); //sending the query to the database

            //displaying all the data retrieved from the database using while lop
            while ($row = mysqli_fetch_assoc($view_survei)){
                $id = $row ['id_survei'];
                $icon = $row ['icon'];
                $judul = $row['judul'];
                $link = $row['link'];
                
                echo "<tr>";
                // echo "<th scope='row'> {$id}</th>";
                echo "<td ><img src='images/".$icon."' width='100' height='100'> </td>";
                echo "<td > {$judul}</td>";
                echo "<td > {$link}</td>";
                echo "<td class='text-center'> <a href='read.php?survei_id={$id}' class='btn btn-outline-success'> <i class='bi bi-eye'></i> Lihat</a></td>";
            }
            ?>
        </tr>
    </tbody>
    </table>
</div>

<!-- Footer -->
<?php include "../footer.php"?>