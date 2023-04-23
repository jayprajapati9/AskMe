<?php

include_once("../classes/user.class.php");
include_once("../classes/session.class.php");
include_once("../classes/helper.class.php");;
include_once("../classes/block.class.php");

Session::start();
$Helper = new Helper();
$User = new User();
$Block = new Block();

$blockfrom = Session::getSessionUser();


if (isset($_POST["myData"])) {
    if ($_POST["myData"]["action"] == "linkblock") {
        $linktitle = $Helper->sanitizeInput($_POST["myData"]["linktitle"]);
        $linkurl = $Helper->sanitizeInput($_POST["myData"]["linkurl"]);
        if ($Block->addNewLink($linktitle, $linkurl, $blockfrom, "linkblock")) {
            echo json_encode(array("status" => "success", "message" => "NEWLINKADDED"));
        } else {
            echo json_encode(array("status" => "failed", "message" => "NEWLINKERR"));
        }
    }

    if ($_POST["myData"]["action"] == "headerblock") {
        $header = $Helper->sanitizeInput($_POST["myData"]["header"]);
        if ($Block->addNewHeader($header, $blockfrom, "headerblock")) {
            echo json_encode(array("status" => "success", "message" => "NEWHEADERADDED"));
        } else {
            echo json_encode(array("status" => "failed", "message" => "NEWHEADERERR"));
        }
    }
}

if (isset($_POST["action"])) {
    if ($_POST["action"] == "updatelinktitle") {
        $linktitle = $Helper->sanitizeInput($_POST["linktitle"]);
        $blockid = $Helper->sanitizeInput($_POST["blockid"]);
        $blocktype = $Helper->sanitizeInput($_POST["type"]);

        if ($Block->updateBlock($blockid, $blocktype, $linktitle)) {
            echo "DONE";
        } else {
            echo "NOT DONE";
        }
    }

    if ($_POST["action"] == "updatelinkurl") {
        $linkurl = $Helper->sanitizeInput($_POST["linkurl"]);
        $blockid = $Helper->sanitizeInput($_POST["blockid"]);
        $blocktype = $Helper->sanitizeInput($_POST["type"]);

        if ($Block->updateBlock($blockid, $blocktype, $linkurl)) {
            echo "DONE";
        } else {
            echo "NOT DONE";
        }
    }

    if ($_POST["action"] == "updateheader") {
        $header = $Helper->sanitizeInput($_POST["header"]);
        $blockid = $Helper->sanitizeInput($_POST["blockid"]);
        $blocktype = $Helper->sanitizeInput($_POST["type"]);

        if ($Block->updateBlock($blockid, $blocktype, $header)) {
            echo "DONE";
        } else {
            echo "NOT DONE";
        }
    }

    if ($_POST["action"] == "deleteblock") {
        $blockid = $Helper->sanitizeInput($_POST["blockid"]);
        if ($Block->deleteBlock($blockid)) {
            echo json_encode(array("message" => "success"));
        } else {
            echo json_encode(array("message" => "failed"));
        }
    }

    if ($_POST["action"] == "getblocks") {
        $return_arr = array();
        foreach ($Block->getBlocks($blockfrom, "panelview") as $link) {
            $return_arr[] = array(
                "blockid" => $link->blockid,
                "blocktype" => $link->blocktype,
                "linktitle" => $link->linktitle,
                "linkurl" => $link->linkurl,
                "header" => $link->header,
                "blockenabled" => $link->blockenabled
            );
        }
        // Encoding array in JSON format
        header('Content-type: application/json');
        echo json_encode($return_arr);
    }

    if ($_POST["action"] == "blockenabledisable") {
        $isenabled = $Helper->sanitizeInput($_POST["isenabled"]);
        $blockid = $Helper->sanitizeInput($_POST["blockid"]);

        if ($Block->blockEnableDisable($isenabled, $blockid)) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failed"));
        }
    }

    if ($_POST["action"] == "reorderblock") {
        $linkidarr = array();

        if (isset($_POST['linkidarr'])) {
            $linkidarr = $_POST['linkidarr'];
        }

        if (count($linkidarr) > 0) {
            if ($Block->reOrderBlock($linkidarr)) {
                echo json_encode(array("status" => "success"));
            } else {
                echo json_encode(array("status" => "failed"));
            }
        }
    }
}
