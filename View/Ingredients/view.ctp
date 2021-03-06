<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo $ingredient['Ingredient']['name']; ?></h1>
    <ol class="breadcrumb">
        <li><?php echo $this->Html->link('藥物成份', '/ingredients/index'); ?></li>
        <li class="active"><?php echo $ingredient['Ingredient']['name']; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div id="IngredientsView" class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <?php echo $this->element('paginator'); ?>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="DrugsIndexTable">
                        <thead>
                            <tr>
                                <th>品名</th>
                                <th>許可證字號</th>
                                <th><?php echo $this->Paginator->sort('License.expired_date', '有效日期', array('url' => $url)); ?></th>
                                <th><?php echo $this->Paginator->sort('License.license_date', '發證日期', array('url' => $url)); ?></th>
                                <th><?php echo $this->Paginator->sort('License.submitted', '更新日期', array('url' => $url)); ?></th>
                            </tr>
                        </thead>
                        <tbody>
            <?php
            $i = 0;
            foreach ($items as $item) {
                ?>
                            <tr>
                                <td>
                        <?php echo $this->Html->link("{$item['License']['name']}({$item['License']['name_english']})", array('controller' => 'drugs', 'action' => 'view', $item['Drug']['id'])); ?></td>
                                <td><?php
                        echo $item['License']['license_id'];
                        ?></td>
                                <td><?php
                        echo $item['License']['expired_date'];
                        ?></td>
                                <td><?php
                        echo $item['License']['license_date'];
                        ?></td>
                                <td><?php
                        echo $item['License']['submitted'];
                        ?></td>
                            </tr>
            <?php }; // End of foreach ($items as $item) {  ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                <?php echo $this->element('paginator'); ?>
                </div>
            </div>
        </div>

    </div>
</section><!-- /.content -->
