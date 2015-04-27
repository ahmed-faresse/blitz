<div class="container main">
  <div class='row image'>
    <div class='col-md-12'>
      <?php echo img($event->image_large_path, "center-block", "event"); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1><?php echo $event->name; ?></h1>
    </div>
  </div>
   <div class="row margin">
    <div class="col-md-12">
      <p>$<?php echo "$event->price_funded";?> / $<?php echo "$event->price_asked";?></p>
      <progress max=<?php echo "$event->price_asked";?> value=<?php echo "$event->price_funded";?>></progress>
    </div>
  </div>
  <div class="row margin">
    <div class="col-md-10 col-md-offset-1">
      <p class="description"> <?php echo $event->description; ?></p>
    </div>
  </div>
  <div class="row margin">
    <div class="col-md-3 col-md-offset-2 date">
      <i class="fa fa-map-marker"></i>
      <p><?php echo $event->place; ?></p>
    </div>
    <div class="col-md-3 col-md-offset-2 place">
      <i class="fa fa-clock-o"></i>
      <p><?php echo date('F d, Y<\b\\r>h:mA', strtotime($event->date)) ; ?></p>
    </div>
  </div>
  <div class="row margin">
      <?php echo $map['html']; ?>
  </div>
</div>

<?php echo $map['js']; ?>