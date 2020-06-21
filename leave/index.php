<?php
require('bar.php');
if($_SESSION['ROLE']!=1){ // SIMPLE USER (not admin) c l'interface utilisateur qui se charge add_employe
	header('location:add_employee.php?id='.$_SESSION['USER_ID']);
	die();
}
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){ // si on est dans l'interface admin on peut suprimer ou modifier un departement 
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from department where id='$id'");
} 
$res=mysqli_query($con,"select * from department order by id desc");
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Department </h4>
						   <h4 class="box_title_link"><a href="add_department.php">Add Department</a> </h4>  <!-- LIEN POUR AJOUTER UN DEPARTEMENT  -->
                     </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">number</th>
                                       <th width="5%">ID</th>
                                       <th width="70%">Department Name</th>
                                       <th width="20%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>     <!-- POUR AFFICHER NUMBER ET L ID ET LE DEPARTEMENT NAME  -->
									<tr>
                                       <td><?php echo $i?></td>
									   <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['department']?></td>
                                        <!-- SI ON VEUT MODIFIER C DANS add_departement et pour supprimer c index.php  -->
									   <td><a href="add_department.php?id=<?php echo $row['id']?>">modifier</a> <a href="index.php?id=<?php echo $row['id']?>&type=delete">supprimer</a></td>
                                    </tr>
									<?php 
									$i++;
									} ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         
<?php
require('footer.php');
?>