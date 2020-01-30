<section class="content-header">
  <h1>
    Teachers Course
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Teacher') ?></dt>
            <dd><?= $teachersCourse->has('teacher') ? $this->Html->link($teachersCourse->teacher->name, ['controller' => 'Teachers', 'action' => 'view', $teachersCourse->teacher->id]) : '' ?></dd>
            <dt scope="row"><?= __('Course') ?></dt>
            <dd><?= $teachersCourse->has('course') ? $this->Html->link($teachersCourse->course->name, ['controller' => 'Courses', 'action' => 'view', $teachersCourse->course->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($teachersCourse->id) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
