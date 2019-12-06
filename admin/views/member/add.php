

<div class="col-md-10 content"  style="overflow: auto">
<ul class="nav nav-tabs">
     <li><a href="/kit_club/admin.php?url=member/add" >Thêm thành viên <span class=""></span></a></li>
    <li><a href="/kit_club/admin.php?url=member/listAll" >Danh sách thành viên <span class=""></span></a>
    </li>
</ul>
<h2 >Member Add</h2>


<div class="content-section" >
  <form action="" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
					<td><input type="text" name="fullname" placeholder=" fullname" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name="username" placeholder=" username" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name=password placeholder=" password" class="form-control"></td>
					</div>
					<div class="form-group">
					<td><input type="text" name="email" placeholder=" email" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td><input type="text" name="phone" placeholder=" phone" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td><input type="text" name="class" placeholder=" class" class="form-control"></td>
					
					</div>
					<div class="form-group">
					<td>
					
								<select type="text" name="role"  class="form-control" placeholder=" class"  name="role">
								<option selected disabled >Choose Role</option>";
									<option value='1'>Ban nhân sự</option>";
									<option value='2'>Ban truyền thông</option>";
									<option value='3'>Ban sự kiện</option>";
									<option value='4'>Ban hậu cần</option>";
									<option value='5'>Ad truyền thông</option>";
									<option value='6'>admin</option>";
									
									
								</select>
					</td>
					
					</div>
					<div class="form-group">
					<td><input type="file" name="avatar" class="form-control" ></td>
					
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
    		<button type="submit" class="btn btn-default" name="add">Add</button>
</form>

</div>
</div>

<div class="icon-content">
        <i class="fas fa-align-justify" onclick="show()"></i>
    </div>
    <div class="icon-content-back">
        <i class="fas fa-times-circle" onclick="hide()"></i>
    </div>


