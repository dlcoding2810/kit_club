
<div class="col-md-10 content"  style="overflow: auto">
<h2>News List</h2>
<div class="col-md-3"><div class="row">
<form action="" type="GET">
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="search_news">
  </div>
</form>
</div></div>

<!-- /.col-lg-12 -->
    <table class="table table-bordered ">
        <thead>
            <tr align="center">
                <th>Number</th>
                <th>Image</th>
               
                <th>Name</th>
              
                <th>Content</th>
                <th>Author</th>
                <th>Date</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(count($news)>0){

        $stt=0;
            foreach($news as $item){
            $stt++; ?>
            <tr class="table-content" align="center">
                <td><?php echo $stt ?></td>
                <td><img style="width: 120px;" src="public/img_news/thumbnail/<?php echo $item['tags']."/".$item['images'] ?>" /></td>
               
                <td><?php echo $item['title'] ?></td>
                <td><?php echo $item['content'] ?></td>
                <td><?php echo $item['author']?></td>
                <td><?php echo $item['createdate'] ?></td>
                <td class="center"><a style="color:red" onclick="return confirm('Delete News?');" href="admin.php?url=news/delete/<?php echo $item['id'] ?>"> Delete</a></td>
                <td class="center"><a style="color:blue" href="admin.php?url=news/edit/<?php echo $item['id'] ?>">Edit</a></td>
                <td class="center"><a href="/kit_club/index.php?url=news/detail/<?php echo $item['id'] ?>" target="_blank" style="color:green">View</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

     <div class="pagination_admin" style="clear:both">
                        <ul class="paginate_admin">
                    
                        <?php
                        for($i=1; $i<=$sumpage ;$i++){
                            ?><li style="clear:both;flex:auto; display:inline ; boder:5px; background-color:white; padding:5px; margin:auto"><a href="admin.php?url=news/listAll/<?=$i?>" title="Trang '.$i.'"><?=$i?></a></li>
                         <?php
                        }?>
                   
                        </ul>
                    </div>

<?php } else{ echo "<div class='col-md-12'><div class='row'><p>Not found.</p></div></div>"; } ?>

</div>
