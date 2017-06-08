<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-category" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_name) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_name; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>

      </div>          
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-custom_product_tab" class="form-horizontal">
          <input type="hidden" name="product_id" value="<?php echo $productid ?>" />
          <input type="hidden" name="productname" value="<?php echo $product_name ?>" />
           <table id="customtab" class="table table-striped table-bordered table-hover">
                        <thead>
              <tr>
                <td class="text-left"><?php echo $entry_meta_title; ?></td>
                <td class="text-left"><?php echo $entry_status ?></td>
                <td class="text-right"><?php echo $entry_description; ?></td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <?php $tab_row = 0; ?>
               
              <?php   if($custom_product_tabs){
              foreach ($custom_product_tabs as $custom_product_tab) { 

                ?>
          
              <tr id="customtab<?php echo $tab_row; ?>">
                <td class="text-left">
                  <?php foreach ($languages as $language) {?>
                  
                  <div class="input-group pull-left">
                    <span class="input-group-addon">
                      <img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> 
                    </span>
                  
                      <input type="text" name="custom_product_tab[<?php echo $tab_row; ?>][customtab_title][<?php echo $language['language_id']; ?>][title]" value="<?php echo isset($custom_product_tab['customtab_title'][$language['language_id']]) ? $custom_product_tab['customtab_title'][$language['language_id']]['title'] : ''; ?>" placeholder="<?php echo $entry_meta_title; ?>" id="input-name<?php echo $language['language_id']; ?>" class="form-control" />

                  </div>
                    <?php if(isset($error_customtab_title[$tab_row][$language['language_id']])) { ?>
                  <div class="text-danger"><?php echo $error_customtab_title[$tab_row][$language['language_id']]; ?></div>
                  <?php } ?>
                  <?php }?>
                </td>


                <td class="text-left" style="width: 30%;">
                 <select name="custom_product_tab[<?php echo $tab_row; ?>][customtab_status]" id="input-status" class="form-control">
                    <?php $status= $custom_product_tab['customtab_status'] ; if($status) { ?>
                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                    <option value="0"><?php echo $text_disabled; ?></option>
                    <?php } else { ?>
                    <option value="1"><?php echo $text_enabled; ?></option>
                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                    <?php } ?>
                  </select>
                </td>

                
                
                <td class="text-right">
                  <?php foreach ($languages as $language) {?>
                <div class="input-group pull-left">
                <span class="input-group-addon">
                <img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> 
                </span>
            
                  <textarea name="custom_product_tab[<?php echo $tab_row; ?>][customtab_description][<?php echo $language['language_id']; ?>][description]" placeholder="<?php echo $entry_description; ?>" class="form-control"><?php echo isset($custom_product_tab['customtab_description'][$language['language_id']]) ? $custom_product_tab['customtab_description'][$language['language_id']]['description'] : ''; ?></textarea>
                </div>
                <?php if(isset($error_customtab_description[$tab_row][$language['language_id']])) { ?>
                  <div class="text-danger"><?php echo $error_customtab_description[$tab_row][$language['language_id']]; ?></div>
                  <?php } ?>
                  <?php } ?>
                </td>
                <td class="text-left"><button type="button" onclick="$('#customtab<?php echo $tab_row; ?>, .tooltip').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
              </tr>
              <?php $tab_row++; ?>
              <?php } }?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3"></td>
                <td class="text-left"><button type="button" onclick="addCustomTab();" data-toggle="tooltip" title="<?php echo $button_custom_product_tab_add; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
              </tr>
            </tfoot>
          </table>
          
        </form>
    
    </div>
  </div>
  

 <script type="text/javascript"><!--
var tab_row = <?php echo $tab_row; ?>;

function addCustomTab() {
 
  html  = '<tr id="customtab' + tab_row + '">';
    html += '  <td class="text-left" style ="width:30%">';
  <?php foreach ($languages as $language) { ?>
  html += '    <div class="input-group">';
  html += '      <span class="input-group-addon"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /></span><input type="text" name="custom_product_tab[' + tab_row + '][customtab_title][<?php echo $language['language_id']; ?>][title]" value="" placeholder="<?php echo $entry_meta_title; ?>" class="form-control" />';
    html += '    </div>';
  <?php } ?>
  html += '  </td>';  
  html +=' <td class="text-left" style ="width:10%"><select name="custom_product_tab[' + tab_row + '][customtab_status]" class="form-control">';

 html +='<option value="1">Enabled</option><option value="0" selected="selected">Disabled</option></select></td>';
 
  html += '  <td class="text-left">';
  <?php foreach ($languages as $language) { ?>
    html += '    <div class="input-group">';
   html += '      <span class="input-group-addon"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /></span><textarea type="text" id="input-customdesc<?php echo $language['language_id']; ?>' + tab_row + 'img"  name="custom_product_tab[' + tab_row + '][customtab_description][<?php echo $language['language_id']; ?>][description]" placeholder="<?php echo $entry_description; ?>" class="form-control cust_des"></textarea>';
    html += ' </div>';

  <?php }?>
  
    html += '  </td>';  
  html += '  <td class="text-left"><button type="button" onclick="$(\'#customtab' + tab_row  + '\').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
  html += '</tr>';
  $('#customtab tbody').append(html);

  tab_row++;
}
//--></script>

</div>
<?php echo $footer; ?>