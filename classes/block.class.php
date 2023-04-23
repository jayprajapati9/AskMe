<?php

include_once("database.class.php");

class Block extends Database
{

    private function displayOrder($blockfrom)
    {
        $stmt = $this->conn->prepare("SELECT MAX(displayorder) AS maxorder FROM `blocks` WHERE blockfrom = ?");
        $stmt->bind_param("s", $blockfrom);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if (is_null($row["maxorder"]) && $row["maxorder"] == null) {
            return 1;
        } else {
            $position = $row["maxorder"];
            return $position + 1;
        }
        $stmt->close();
    }

    public function addNewLink($linktitle, $linkurl, $blockfrom, $blocktype)
    {
        $stmt = $this->conn->prepare("INSERT INTO `blocks` (linktitle, linkurl, blockfrom, blocktype, displayorder) VALUES (?,?,?,?,?)");
        $displayorder = self::displayOrder($blockfrom);
        $stmt->bind_param("ssssi", $linktitle, $linkurl, $blockfrom, $blocktype, $displayorder);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function addNewHeader($header, $blockfrom, $blocktype)
    {
        $stmt = $this->conn->prepare("INSERT INTO `blocks` (header, blockfrom, blocktype, displayorder) VALUES (?,?,?,?)");
        $displayorder = self::displayOrder($blockfrom);
        $stmt->bind_param("sssi", $header, $blockfrom, $blocktype, $displayorder);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function getBlocks($blockfrom, $getblockfor)
    {
        $blockenabled = "yes";
        $data = array();
        if ($getblockfor == "userview") {
            $stmt = $this->conn->prepare("SELECT * FROM `blocks` WHERE blockfrom = ? AND blockenabled = ? ORDER BY displayorder");
            $stmt->bind_param("ss", $blockfrom, $blockenabled);
        } else if ($getblockfor == "panelview") {
            $stmt = $this->conn->prepare("SELECT * FROM `blocks` WHERE blockfrom = ? ORDER BY displayorder");
            $stmt->bind_param("s", $blockfrom);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
        $stmt->close();
        return $data;
    }

    public function updateBlock($blockid, $blocktype, $blockvalue)
    {
        $query = "UPDATE `blocks` SET $blocktype = ? WHERE blockid = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $blockvalue, $blockid);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function deleteBlock($blockid)
    {
        $stmt = $this->conn->prepare("DELETE FROM `blocks` WHERE blockid = ?");
        $stmt->bind_param("i", $blockid);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function blockEnableDisable($isChecked, $blockid)
    {
        $stmt = $this->conn->prepare("UPDATE `blocks` SET blockenabled = ? WHERE blockid = ?");
        $stmt->bind_param("si", $isChecked, $blockid);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function reOrderBlock($linkidarr)
    {
        $position = 1;
        foreach ($linkidarr as $id) {
            $stmt = $this->conn->prepare("UPDATE `blocks` SET displayorder = ? WHERE blockid = ?");
            $stmt->bind_param("ii", $position, $id);
            $stmt->execute();
            $position++;
        }
        return true;
    }
}
