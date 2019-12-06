<div class="col-md-10 content"  style="overflow: auto">
<h2 >Member Edit</h2>

<div class="content-section" style="padding-bottom:120px">
  <form action="admin.php?url=member/postEdit/<?=$id?>" method="POST" enctype="multipart/form-data" >
 
  <div class="form-group">
					<td><input type="text" name="fullname" placeholder="fullname" value="<?php echo $user['fullname']?>" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name="username" placeholder="username" value="<?php echo $user['username']?>" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name=password value="" placeholder="password" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name="email" value="<?php echo $user['email']?>" class="form-control" ></td>
					
					</div>
					<div class="form-group">
					<td><input type="text" name="phone" value="<?php echo $user['phone']?>" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td><input type="text" name="class" value="<?php echo $user['class']?>" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td><input type="text" name="role" value="<?php echo $user['role']?>" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td><input type="file" name="avatar" value="<?php echo $user['avatar']?>" class="form-control" ></td>
					
					</div>
					
					
					
					<div class="form-group">
					
					<td>Birthday</td>
							<td>
								<select name="day">
									<option value="ngay">Ngay</option>
									<?php 
										for($i=1;$i<=31;$i++){
											echo "<option value='$i'>$i</option>";
										}
									?>
								</select>
								<select name="month">
									<option value="thang">Thang</option>
									<?php
										$thang = array(1=>"Jan","Feb","March","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
										
									foreach( $thang as $key=>$tam) {
										echo "<option value='$key'>$tam</option>";
									}
									?>
								</select>
								<select name="year">
									<option value="nam">Nam</option>
									<?php 
										for($j=1995;$j<=date("Y");$j++){
											echo "<option value='$j'>$j</option>";
										}
									?>
								</select>
							</td>
					</div>

					<div class="form-group">
					<td>Gender</td>
							<td>
								<input type="radio" name="gender" value="1"/>Nam
								<input type="radio" name="gender" value="2"/>Nu
							</td>
					
					</div>
    <button type="submit" class="btn btn-default" name="post_edit">Edit</button>


</form>
</div>

</div>