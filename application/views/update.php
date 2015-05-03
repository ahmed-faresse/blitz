<div class="container main">
  <?php echo form_open('update/validate/' . $event->id); ?>
  <div class='row image'>
    <div class='col-md-12'>
      <?php echo img($event->image_large_path, "center-block", "event"); ?>
    </div>
  </div>
  <?php if (validation_errors() != '') { ?>
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>Error !</strong><br/><br/><?php echo validation_errors();?>
            </div>
          </div>
        </div>
    <?php } ?>
  <div class="row form-group">
    <div class="col-md-12">
      <label for="title">Title</label>
      <input name="title" id="title" type="text" class="" value="<?php echo $title ;?>">
    </div>
  </div>
   <div class="row margin">
    <div class="col-md-12">
    <label for="price">Price</label>
      <p>$<?php echo "$event->price_funded";?> /
      <input name="price" id="price" type="text" class="" value="<?php echo $price ;?>"></p>
      <progress max=<?php echo "$price";?> value=<?php echo "$event->price_funded";?>></progress>
    </div>
  </div>
  <div class="row margin">
    <div class="col-md-10 col-md-offset-1">
      <label for="description">Description</label>
      <textarea name="description" id="description" class="form-control" rows="10"><?php echo $description ?></textarea>
    </div>
  </div>
  <div class="row margin">
    <div class="col-md-4 col-md-offset-4 place">
      <i class="fa fa-map-marker"></i>
      <label class="sr-only" for="place">Title</label>
      <input name="place" id="place" type="text" class="form-control" value="<?php echo $place ;?>">
      <p id="dates"></p>
    </div>
  </div>
  <div class="row margin">
    <div class="col-md-3 col-md-offset-2 date">
      <i class="fa fa-calendar"></i>
      <label class="sr-only" for="date">Date</label>
      <input name="date" id="date" type="text" class="form-control" value="<?php echo $date ; ?>">
    </div>
    <div class="col-md-3 col-md-offset-2 date">
      <i class="fa fa-clock-o"></i>
      <label class="sr-only" for="time">Time</label>
      <input name="time" id="time" type="text" class="form-control" value="<?php echo $time ; ?>">
    </div>
  </div>
  <div class="row margin">
    <div class="col-md-4 col-md-offset-4">
      <button class="btn btn-block btn-info" type="submit">Save Changes</button>
    </div>
  </div>
  </form>
  <div class="row margin">
      <?php echo $map['html']; ?>
  </div>
</div>

<?php echo $map['js']; ?>