<div class="col-md-10 content"  style="overflow: auto">
<h2>Sửa Tin Tức</h2>


<div class="content-section" style="padding-bottom:120px">
    <form action="admin.php?url=news/postEdit/<?=$id?>" method="POST" enctype="multipart/form-data">
        <span><b>Danh mục</b></span><br>
            <select name="tag" id="tag">
                <option value="news">Tin tức</option>
                <option value="notice">Thông báo</option>
                <option value="lifeStory">Chuyện đời IT</option>
                <option value="meeting">Lịch họp CLB</option>
                <option value="product">Sản phẩm</option>
                <option value="course">Khóa học</option>
                <option value="project">Dự án</option>
            </select>
        <div class="form-group">
            <label>Tiêu đề</label>
            <input class="form-control" name="txtName" placeholder="Tiêu đề" value="<?=$news['title']?>">
        </div>
        <div class="form-group">
            <label>Ảnh bài viết</label>
            <input type="file" name="image" class="form-control">
        </div>
        <label>Tóm tắt</label>
        <div class="form-group">
            <textarea cols="60" rows="5" name="description" id="description_News"><?=$news['description']?></textarea>
        </div>
        <div class="form-group">
            <label>Nội dung</label>
            <textarea class="form-control ckeditor" rows="5" name="txtContent" id="demo"><?=$news['content']?></textarea>
        </div>

        
        <button type="submit" name="edit_news" class="btn btn-success">Add</button>
    
    </form>
</div>
</div>



