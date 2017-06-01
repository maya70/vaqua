<link rel="stylesheet" type="text/css" href="./../vaqua/css/vega.css">

<div class="vega-editor">
    <div class="mod_spec module">
        <div class="mod_header">
            <div class="mod_ctrls">
                <select class="sel_vega_spec hide-vl"></select>
                <select class="sel_vega-lite_spec hide-vg"></select>
                <input type="button" class="btn_spec_format" value="Format">
                <input type="button" class="btn_vg_parse hide-vl" value="Parse">
                <input type="button" class="btn_vl_parse hide-vg" value="Parse">
            </div>
            <a href="./../index.php"><img src="./../vaqua/logo3.png" width="150" height="50"> </a>
            <div class="mod_title">
                <select class="sel_mode" style="display: none;">
                    <option value="vega-lite">Vega-lite</option>
                    <option value="vega">Vega</option>

                </select>
            </div>
        </div>
        <div class="gui_rep">
            <div class="padding"> Data Selection:
                <!--select id="attrselectorx" class="menustyle">
                </select-->
            </div>

            <div class="padding">
                <!--select id="attrselectory" class="menustyle">
                </select-->
            </div>

            <div class="padding"> Choose Size:
                <select id="attrselectorsize" class="menustyle">
                </select>
            </div>

            <div class="padding"> Choose Color:
                <select id="attrselectorcolor" class="menustyle">
                </select>
            </div>

            <div class="padding"> Choose Shape:
                <select id="attrselectorshape" class="menustyle">
                </select>
            </div>

            <div class="padding"> Choose Text:
                <select id="attrselectortext" class="menustyle">
                </select>
            </div>


        </div>

        <div class="gui_attr">
           <div class="padding"> Attribute Specification:

            </div>


        </div>

        <div class="vg_pane mod_subheader hide-vg">
            <div class="mod_ctrls">
                <!--input type="button" class="btn_to_vega" value="Edit spec"-->
            </div>
            <?php
            session_start();
            if (isset($_SESSION['qid'])) {
                $q_id = $_SESSION['qid'];
                $_SESSION['lqid'] = $_SESSION['qid'];
            } else {
                $q_id = $_SESSION['lqid'];
            }

            if (isset($_SESSION['uid'])) {
                $user_id = $_SESSION['uid'];
                $_SESSION['luid'] = $_SESSION['uid'];
            } else {
                $user_id = $_SESSION['luid'];
            }


            require_once __DIR__ . '/../../vaqua/db/DbHelper.php';
            require_once __DIR__ . '/../../vaqua/db/DB.php';

            $vDB = new \VAQUA\DbHelper();
            $db = new \VAQUA\DB();


            echo '<form   name="data" method="post" action="./../vaqua/data/data.php" target="_blank" style="display:inline; margin-left: 50px;">
                  <input style="display:inline; " type = "hidden" name = "id"  value ="' . $q_id . '">
                  <input type="submit" value="Show Data" style="display:inline; margin-left: 50px;" > </form>';
            ?>
            <form name="fileToUpload" id="fileToUpload" action="./app/vaqua/upload.php" method="post" style="display:inline; margin-left: 50px;">
                <input type="file" name="upload" id="upload" value="upload other file" style="display:inline; margin-left: 50px;"></input>
            </form>

            <span class="click_toggle_vega" title="Expand/Collapse Vega editor"></span>
        </div>

        <div class="" style="max-width:400px" spellcheck="false"><?php

            ?></div>
    </div>
    <div class="mod_vis module">
        <div class="mod_header">
            <div class="mod_ctrls">
                Renderer <select class="sel_render"></select>
                <!--        <input type="button" class="btn_export" value="Export">-->
            </div>

        </div>
        <div class="vis"></div>


        <?php
        //include $_SERVER['DOCUMENT_ROOT'].'/newGP/VaquaVega-master/VaquaVega-master/qa-include/pages/question-view.php';
        //    date_default_timezone_set('Africa/Cairo');
        //    $date = new DateTime();
        //    $result = $date->format('Y-m-d H:i:s');
        //    //$result = "'".$result."'";
        //      $acount = $vDB->getAnswerCount($q_id) + 1;
        //
        //      $content = array(
        //          'content' => 'mahmoud and tarek',
        //          'q_id'=> $q_id,
        //          'type' => 'A',
        //          'date' => $result,
        //          'user_id' => $user_id
        //      );
        //      $db->insertPost($content);
        //
        //      $db->updateAnswerCount($acount, $q_id);

        ?>

        <div class="mod_params"></div>
        <div class="spec_desc"></p>
        </div>

        <div class="textAnswer">
            <textarea id="comment" style="resize: none;"
                      placeholder="your comment here about your visualization"></textarea>
            <input type="button" class="btn_export" value="Add Answer">
        </div>
    </div>
