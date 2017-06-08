<?php
class crocus_ControllerDesignLayout extends ControllerDesignLayout {

    /* overridden method, this newly introduced function is always called
       before the final rendering
    */
public function preRender( $template_buffer, $template_name, &$data ) {
        
        if ($template_name != 'design/layout_form.tpl') {
            return parent::preRender( $template_buffer, $template_name, $data );
        }

       // echo "string";exit();
        $this->load->language('design/layout');
        
        $data['text_slider_left'] = $this->language->get('text_slider_left');
        $data['text_slider'] = $this->language->get('text_slider');
        $data['text_slider_right'] = $this->language->get('text_slider_right');
        $data['text_slider_bottom'] = $this->language->get('text_slider_bottom');

        $data['text_top_left'] = $this->language->get('text_top_left');
        $data['text_top_right'] = $this->language->get('text_top_right');
        
        $str_search=array('#module-column-left, #module-column-right, #module-content-top, #module-content-bottom');
        $str_replace=array('#module-column-left, #module-column-right, #module-content-top, #module-content-bottom, #module-slider-left, #module-slider-right, #module-top-left, #module-top-right');
     
        $template_buffer = str_replace($str_search,$str_replace,$template_buffer);
    


        $this->load->helper( 'modifier' );
        $search = '<fieldset>';
        $offset = 2;
        $index = 2;
        $add = <<<'EOT'
                     <div class="row">
                     <div class="col-lg-3 col-md-4 col-sm-12">
                     <table id="module-slider-left" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                      <td class="text-center"><?php echo $text_slider_left; ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($layout_modules as $layout_module) { ?>
                    <?php if ($layout_module['position'] == 'slider_left') { ?>
                    <tr id="module-row<?php echo $module_row; ?>">
                      <td class="text-left"><div class="input-group">
                          <select name="layout_module[<?php echo $module_row; ?>][code]" class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <?php if ($extension['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $extension['code']; ?>" selected="selected"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } ?>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <?php if ($module['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $module['code']; ?>" selected="selected"><?php echo $module['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][position]" value="<?php echo $layout_module['position']; ?>" />
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $layout_module['sort_order']; ?>" />
                          <div class="input-group-btn"><a href="<?php echo $layout_module['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <button type="button" onclick="$('#module-row<?php echo $module_row; ?>').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger btn-sm"><i class="fa fa fa-minus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                    <?php $module_row++; ?>
                    <?php } ?>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="text-left"><div class="input-group">
                          <select class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <div class="input-group-btn">
                            <button type="button" onclick="addModule('slider-left');" data-toggle="tooltip" title="<?php echo $button_module_add; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="col-lg-6 col-md-4 col-sm-12">
                <table id="module-slider" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-center"><?php echo $text_slider; ?></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($layout_modules as $layout_module) { ?>
                    <?php if ($layout_module['position'] == 'slider') { ?>
                    <tr id="module-row<?php echo $module_row; ?>">
                      <td class="text-left"><div class="input-group">
                          <select name="layout_module[<?php echo $module_row; ?>][code]" class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <?php if ($extension['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $extension['code']; ?>" selected="selected"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } ?>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <?php if ($module['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $module['code']; ?>" selected="selected"><?php echo $module['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][position]" value="<?php echo $layout_module['position']; ?>" />
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $layout_module['sort_order']; ?>" />
                          <div class="input-group-btn"><a href="<?php echo $layout_module['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <button type="button" onclick="$('#module-row<?php echo $module_row; ?>').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger btn-sm"><i class="fa fa fa-minus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                    <?php $module_row++; ?>
                    <?php } ?>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="text-left"><div class="input-group">
                          <select class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <div class="input-group-btn">
                            <button type="button" onclick="addModule('slider');" data-toggle="tooltip" title="<?php echo $button_module_add; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                  </tfoot>
                </table>
               
              </div>
              <div class="col-lg-3 col-md-4 col-sm-12">
                <table id="module-slider-right" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-center"><?php echo $text_slider_right; ?></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($layout_modules as $layout_module) { ?>
                    <?php if ($layout_module['position'] == 'slider_right') { ?>
                    <tr id="module-row<?php echo $module_row; ?>">
                      <td class="text-left"><div class="input-group">
                          <select name="layout_module[<?php echo $module_row; ?>][code]" class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <?php if ($extension['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $extension['code']; ?>" selected="selected"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } ?>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <?php if ($module['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $module['code']; ?>" selected="selected"><?php echo $module['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][position]" value="<?php echo $layout_module['position']; ?>" />
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $layout_module['sort_order']; ?>" />
                          <div class="input-group-btn"><a href="<?php echo $layout_module['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <button type="button" onclick="$('#module-row<?php echo $module_row; ?>').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger btn-sm"><i class="fa fa fa-minus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                    <?php $module_row++; ?>
                    <?php } ?>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="text-left"><div class="input-group">
                          <select class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <div class="input-group-btn">
                            <button type="button" onclick="addModule('slider-right');" data-toggle="tooltip" title="<?php echo $button_module_add; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                  </tfoot>
                </table>
               
              </div>
            </div>
            <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12">
                     <table id="module-slider-bottom" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                      <td class="text-center"><?php echo $text_slider_bottom; ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($layout_modules as $layout_module) { ?>
                    <?php if ($layout_module['position'] == 'slider_bottom') { ?>
                    <tr id="module-row<?php echo $module_row; ?>">
                      <td class="text-left"><div class="input-group">
                          <select name="layout_module[<?php echo $module_row; ?>][code]" class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <?php if ($extension['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $extension['code']; ?>" selected="selected"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } ?>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <?php if ($module['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $module['code']; ?>" selected="selected"><?php echo $module['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][position]" value="<?php echo $layout_module['position']; ?>" />
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $layout_module['sort_order']; ?>" />
                          <div class="input-group-btn"><a href="<?php echo $layout_module['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <button type="button" onclick="$('#module-row<?php echo $module_row; ?>').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger btn-sm"><i class="fa fa fa-minus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                    <?php $module_row++; ?>
                    <?php } ?>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="text-left"><div class="input-group">
                          <select class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <div class="input-group-btn">
                            <button type="button" onclick="addModule('slider-bottom');" data-toggle="tooltip" title="<?php echo $button_module_add; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            <div class="row">
              <div class="col-lg-6 col-md-4 col-sm-12">
                <table id="module-top-left" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-center"><?php echo $text_top_left; ?></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($layout_modules as $layout_module) { ?>
                    <?php if ($layout_module['position'] == 'top_left') { ?>
                    <tr id="module-row<?php echo $module_row; ?>">
                      <td class="text-left"><div class="input-group">
                          <select name="layout_module[<?php echo $module_row; ?>][code]" class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <?php if ($extension['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $extension['code']; ?>" selected="selected"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } ?>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <?php if ($module['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $module['code']; ?>" selected="selected"><?php echo $module['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][position]" value="<?php echo $layout_module['position']; ?>" />
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $layout_module['sort_order']; ?>" />
                          <div class="input-group-btn"><a href="<?php echo $layout_module['edit']; ?>" type="button" data-toggle="tooltip" title="<?php echo $button_edit; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <button type="button" onclick="$('#module-row<?php echo $module_row; ?>').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger btn-sm"><i class="fa fa fa-minus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                    <?php $module_row++; ?>
                    <?php } ?>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="text-left"><div class="input-group">
                          <select class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <div class="input-group-btn">
                            <button type="button" onclick="addModule('top-left');" data-toggle="tooltip" title="<?php echo $button_module_add; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="col-lg-6 col-md-4 col-sm-12">
                 <table id="module-top-right" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-center"><?php echo $text_top_right; ?></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($layout_modules as $layout_module) { ?>
                    <?php if ($layout_module['position'] == 'top_right') { ?>
                    <tr id="module-row<?php echo $module_row; ?>">
                      <td class="text-left"><div class="input-group">
                          <select name="layout_module[<?php echo $module_row; ?>][code]" class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <?php if ($extension['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $extension['code']; ?>" selected="selected"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } ?>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <?php if ($module['code'] == $layout_module['code']) { ?>
                            <option value="<?php echo $module['code']; ?>" selected="selected"><?php echo $module['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][position]" value="<?php echo $layout_module['position']; ?>" />
                          <input type="hidden" name="layout_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $layout_module['sort_order']; ?>" />
                          <div class="input-group-btn"><a href="<?php echo $layout_module['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <button type="button" onclick="$('#module-row<?php echo $module_row; ?>').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger btn-sm"><i class="fa fa fa-minus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                    <?php $module_row++; ?>
                    <?php } ?>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="text-left"><div class="input-group">
                          <select class="form-control input-sm">
                            <?php foreach ($extensions as $extension) { ?>
                            <optgroup label="<?php echo $extension['name']; ?>">
                            <?php if (!$extension['module']) { ?>
                            <option value="<?php echo $extension['code']; ?>"><?php echo $extension['name']; ?></option>
                            <?php } else { ?>
                            <?php foreach ($extension['module'] as $module) { ?>
                            <option value="<?php echo $module['code']; ?>"><?php echo $module['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                          <div class="input-group-btn">
                            <button type="button" onclick="addModule('top-right');" data-toggle="tooltip" title="<?php echo $button_module_add; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
                          </div>
                        </div></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              </div>


EOT;
      $template_buffer = Modifier::modifyStringBuffer( $template_buffer, $search, $add, 'after', $offset, $index );

     
        // call parent method
        return parent::preRender( $template_buffer, $template_name, $data );
    }
}
?>