<style>
.content {
  width: 100%;
  max-width: 800px;
  text-align: center;
  margin: 0 auto;
  padding: 0 0 3em 0;
}

.box {
  background-color: #c1c1ff;
  padding: 6.25rem 1.25rem;
}

.inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.inputfile + label {
    max-width: 80%;
    width: 80%;
    font-size: 1.25rem;
    /* 20px */
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: block;
    overflow: hidden;
    color: #4c39d3;
    border: 1px solid #4c39d3;
    background-color: #e6e5f1;
    margin: 0 auto;
}

.inputfile:focus + label {
    outline: 1px dotted #000;
}

.inputfile:focus + label,
.inputfile + label:hover {
    border-color: #204072;
}

.inputfile + label strong {
    padding: 0.625rem 1.25rem;
    /* 10px 20px */
    height: 100%;
    color: #f1e5e6;
    background-color: #394cd3;
    display: block;
    
}

.inputfile:focus + label strong,
.inputfile + label:hover strong {
    background-color: #204072;
}

@media screen and (max-width: 50em) {
  .inputfile + label strong {
    display: block;
  }
}

</style>
<?php includeWithVars(VIEWS.'/layouts/partials/admin/toolbar.php', [
    'url'=> "/admin/products",
    'label'=> "All Products",
    'title'=> "Create New Product"
]);?>

<div class="row g-3">
  <div class="col-12">
    <form class="needs-validation" method="POST" action="/admin/products/store" enctype="multipart/form-data">
        <div class="row g-3">
          <div class="col-12">
              <label class="form-label">Product name</label>
              <input type="text" class="form-control" placeholder="" value="" required name="name">
              <div class="invalid-feedback">
                Valid name is required.
              </div>
          </div>

          <div class="col-12 form-group">
             <label for="price" class="control-label">Product Price</label>
             <input type="text" class="form-control" id="price" name="price" placeholder="Product Price">
          </div>

          <div class="col-md-6">
              <label for="brand" class="form-label">Brand</label>
              <select class="form-select" id="brand" name="brand_id" required>
                <?php if (is_array($brands)) : ?>
                <option value="">Choose...</option>
                <?php foreach ($brands as $brand): ?>
                   <option value="<?php echo $brand->id; ?>">
                      <?php echo $brand->name; ?>
                   </option>
                <?php endforeach; ?>
               <?php endif; ?>
              </select>
              <div class="invalid-feedback">
                Please select a valid brand.
              </div>
            </div>

            <div class="col-md-6">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" id="category" name="category_id" required>
                <option value="">Choose...</option>
                  <?php if (is_array($categories)) : ?>
                    <?php foreach ($categories as $category): ?>
                      <option value="<?php echo $category->id; ?>">
                        <?php echo $category->name; ?>
                      </option>
                    <?php endforeach; ?>
                  <?php endif; ?>
              </select>
              <div class="invalid-feedback">
                Please provide a valid category.
              </div>
            </div>

          <div class="col-12 mb-3">
            <div class="btn-group" role="group">
              <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" name="status">
              <label class="btn btn-outline-primary" for="btncheck1">Product Status Is Active?</label>

              <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" name="is_new">
              <label class="btn btn-outline-primary" for="btncheck2">Is New?</label>

              <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" name="is_recommended">
              <label class="btn btn-outline-primary" for="btncheck3">Is Recommended?</label>
            </div>
            
          </div>

          <div class="col-12 content">
            <div class="box">
              <input type="file" name="image" id="picture" class="inputfile" multiple accept="image/*"/>
              <label for="picture"><strong> Choose a file&hellip;</strong></label>
              
              <img src="" id="pictureImg" width=400>
            </div>
          </div>

          <div class="col-12 mb-3">
              <label class="form-label">Product description</label>
              <textarea class="form-control" name="description" rows="3"></textarea>
          </div>
        </div>
 

        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Add New</button>
    </form>
  </div>
</div>


<script>

  function readURL() {
          var pictureImg = document.getElementById("pictureImg");
          var input = document.getElementById("picture");
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              pictureImg.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
          }
  }

  document.querySelector('#picture').addEventListener('change',function(){
    readURL()
  });

</script>