<?php

namespace wpdFormAttr\Field;

use wpdFormAttr\Tools\Sanitizer;

class ColorField extends Field {

    protected function dashboardForm() {
        ?>
        <div class="wpd-field-body" style="display: <?php echo esc_attr($this->display); ?>">
            <div class="wpd-field-option wpdiscuz-item">
                <input class="wpd-field-type" type="hidden" value="<?php echo esc_attr($this->type); ?>"
                       name="<?php echo esc_attr($this->fieldInputName); ?>[type]"/>
                <label for="<?php echo esc_attr($this->fieldInputName); ?>[name]"><?php esc_html_e("Name", "wpdiscuz"); ?>
                    :</label>
                <input class="wpd-field-name" type="text" value="<?php echo esc_attr($this->fieldData["name"]); ?>"
                       name="<?php echo esc_attr($this->fieldInputName); ?>[name]"
                       id="<?php echo esc_attr($this->fieldInputName); ?>[name]" required/>
                <p class="wpd-info"><?php esc_html_e("Also used for field placeholder", "wpdiscuz"); ?></p>
            </div>
            <div class="wpd-field-option">
                <label for="<?php echo esc_attr($this->fieldInputName); ?>[desc]"><?php esc_html_e("Description", "wpdiscuz"); ?>
                    :</label>
                <input type="text" value="<?php echo esc_attr($this->fieldData["desc"]); ?>"
                       name="<?php echo esc_attr($this->fieldInputName); ?>[desc]"
                       id="<?php echo esc_attr($this->fieldInputName); ?>[desc]"/>
                <p class="wpd-info"><?php esc_html_e("Field specific short description or some rule related to inserted information.", "wpdiscuz"); ?></p>
            </div>
            <div class="wpd-field-option">
                <div class="input-group">
                    <label for="<?php echo esc_attr($this->fieldInputName); ?>[icon]"><span
                            class="input-group-addon"></span> <?php esc_html_e("Field icon", "wpdiscuz"); ?>
                        :</label>
                    <input data-placement="bottom" class="icp icp-auto"
                           value="<?php echo esc_attr($this->fieldData["icon"]); ?>" type="text"
                           name="<?php echo esc_attr($this->fieldInputName); ?>[icon]"
                           id="<?php echo esc_attr($this->fieldInputName); ?>[icon]"/>
                </div>
                <p class="wpd-info"><?php esc_html_e("Font-awesome icon library.", "wpdiscuz"); ?></p>
            </div>
            <div class="wpd-field-option">
                <label for="<?php echo esc_attr($this->fieldInputName); ?>[required]"><?php esc_html_e("Field is required", "wpdiscuz"); ?>
                    :</label>
                <input type="checkbox" value="1" <?php checked($this->fieldData["required"], 1, true); ?>
                       name="<?php echo esc_attr($this->fieldInputName); ?>[required]"
                       id="<?php echo esc_attr($this->fieldInputName); ?>[required]"/>
            </div>
            <div class="wpd-field-option">
                <label for="<?php echo esc_attr($this->fieldInputName); ?>[is_show_sform]"><?php esc_html_e("Display on reply form", "wpdiscuz"); ?>
                    :</label>
                <input type="checkbox" value="1" <?php checked($this->fieldData["is_show_sform"], 1, true); ?>
                       name="<?php echo esc_attr($this->fieldInputName); ?>[is_show_sform]"
                       id="<?php echo esc_attr($this->fieldInputName); ?>[is_show_sform]"/>
            </div>
            <div class="wpd-field-option">
                <label for="<?php echo esc_attr($this->fieldInputName); ?>[is_show_on_comment]"><?php esc_html_e("Display on comment", "wpdiscuz"); ?>
                    :</label>
                <input type="checkbox" value="1" <?php checked($this->fieldData["is_show_on_comment"], 1, true); ?>
                       name="<?php echo esc_attr($this->fieldInputName); ?>[is_show_on_comment]"
                       id="<?php echo esc_attr($this->fieldInputName); ?>[is_show_on_comment]"/>
            </div>
            <div class="wpd-field-option">
                <label for="<?php echo esc_attr($this->fieldInputName); ?>[show_for_guests]"><?php esc_html_e("Display for Guests", "wpdiscuz"); ?>
                    :</label>
                <input type="checkbox" value="1" <?php checked($this->fieldData["show_for_guests"], 1, true); ?>
                       name="<?php echo esc_attr($this->fieldInputName); ?>[show_for_guests]"
                       id="<?php echo esc_attr($this->fieldInputName); ?>[show_for_guests]"/>
            </div>
            <div class="wpd-field-option">
                <label for="<?php echo esc_attr($this->fieldInputName); ?>[show_for_users]"><?php esc_html_e("Display for Registered Users", "wpdiscuz"); ?>
                    :</label>
                <input type="checkbox" value="1" <?php checked($this->fieldData["show_for_users"], 1, true); ?>
                       name="<?php echo esc_attr($this->fieldInputName); ?>[show_for_users]"
                       id="<?php echo esc_attr($this->fieldInputName); ?>[show_for_users]"/>
            </div>
            <div class="wpd-advaced-options wpd-field-option">
                <small class="wpd-advaced-options-title"><?php esc_html_e("Advanced Options", "wpdiscuz"); ?></small>
                <div class="wpd-field-option wpd-advaced-options-cont">
                    <div class="wpd-field-option">
                        <label for="<?php echo esc_attr($this->fieldInputName); ?>[meta_key]"><?php esc_html_e("Meta Key", "wpdiscuz"); ?>
                            :</label>
                        <input type="text" value="<?php echo esc_attr($this->name); ?>"
                               name="<?php echo esc_attr($this->fieldInputName); ?>[meta_key]"
                               id="<?php echo esc_attr($this->fieldInputName); ?>[meta_key]" required="required"/>
                    </div>
                    <div class="wpd-field-option">
                        <label for="<?php echo esc_attr($this->fieldInputName); ?>[meta_key_replace]"><?php esc_html_e("Replace old meta key", "wpdiscuz"); ?>
                            :</label>
                        <input type="checkbox" value="1" checked="checked"
                               name="<?php echo esc_attr($this->fieldInputName); ?>[meta_key_replace]"
                               id="<?php echo esc_attr($this->fieldInputName); ?>[meta_key_replace]"/>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <?php
    }

    public function editCommentHtml($key, $value, $data, $comment) {
        if (!$this->isShowForUser($data) || ($comment->comment_parent && !$data["is_show_sform"])) {
            return "";
        }
        $html     = "<tr class='" . esc_attr($key) . "-wrapper wpd-edit-color'><td class='first'>";
        $html     .= "<label for='" . esc_attr($key) . "'>" . esc_html($data["name"]) . ": </label>";
        $html     .= "</td><td>";
        $html     .= "<div class='wpdiscuz-item'>";
        $required = $this->isValidateRequired($data) ? "required='required' aria-required='true'" : "";
        $html     .= "<input  " . $required . " class='wpd-field wpd-field-color' type='color' id='" . esc_attr($key) . "' value='" . esc_attr($value) . "'  name='" . esc_attr($key) . "' pattern='^\#[A-Za-z0-9]{6}$' title='#ff8040'>";
        $html     .= "</div>";
        $html     .= "</td></tr>";
        return $html;
    }

    public function frontFormHtml($name, $args, $options, $currentUser, $uniqueId, $isMainForm) {
        if (!$this->isShowForUser($args, $currentUser) || (!$isMainForm && !$args["is_show_sform"])) {
            return;
        }
        $hasIcon = $args["icon"] ? true : false;
        $hasDesc = $args["desc"] ? true : false;
        ?>
        <div class="wpdiscuz-item wpd-field-color <?php echo esc_attr($name) . "-wrapper" . ($hasIcon ? " wpd-has-icon" : "") . ($hasDesc ? " wpd-has-desc" : ""); ?>">
            <div class="wpd-field-title">
                <?php echo esc_html($args["name"]); ?>
            </div>
            <?php if ($hasIcon) { ?>
                <div class="wpd-field-icon"><i style="opacity: 0.8;"
                                               class="<?php echo strpos(trim($args["icon"]), " ") ? esc_attr($args["icon"]) : "fas " . esc_attr($args["icon"]); ?>"></i>
                </div>
            <?php } ?>
            <?php $required = $args["required"] ? "required='required' aria-required='true'" : ""; ?>
            <input id="<?php echo esc_attr($name) . "-" . $uniqueId; ?>" <?php echo $required; ?>
                   class="<?php echo esc_attr($name); ?> wpd-field wpd-field-color" type="color"
                   name="<?php echo esc_attr($name); ?>" value="#000000" placeholder="#ff8040"
                   pattern="^\#[A-Za-z0-9]{6}$" title="#ff8040">
            <label for="<?php echo esc_attr($name) . "-" . $uniqueId; ?>"
                   class="wpdlb"><?php echo esc_attr($args["name"]) . (!empty($args["required"]) ? "*" : ""); ?></label>
            <?php if ($args["desc"]) { ?>
                <div class="wpd-field-desc"><i
                        class="far fa-question-circle"></i><span><?php echo esc_html($args["desc"]); ?></span></div>
            <?php } ?>
        </div>
        <?php
    }

    public function frontHtml($value, $args) {
        if (!$this->isShowForUser($args)) {
            return "";
        }
        $html = "<div class='wpd-custom-field wpd-cf-color'>";
        $html .= "<div class='wpd-cf-label'>" . esc_html($args["name"]) . "</div> <div class='wpd-cf-value' style='background:" . esc_attr($value) . ";'> " . esc_html(apply_filters("wpdiscuz_custom_field_color", $value, $args)) . " </div>";
        $html .= "</div>";
        return $html;
    }

    public function validateFieldData($fieldName, $args, $options, $currentUser) {
        $value = Sanitizer::sanitize(INPUT_POST, $fieldName, "FILTER_SANITIZE_STRING");
        if ($value && !preg_match("@^\#[A-Za-z0-9]{6}$@is", $value)) {
            $value = "";
        }
        if ($this->isValidateRequired($args, $currentUser) && !$value && $args["required"]) {
            wp_die(esc_html__($args["name"], "wpdiscuz") . " : " . esc_html__("field is required!", "wpdiscuz"));
        }
        return $value;
    }

}
