<?php

include_once("database.class.php");

class Design extends Database
{
    public function updateTheme($username, $theme, $iscustom)
    {
        $stmt = $this->conn->prepare("UPDATE `users` SET usertheme = ? , iscustom = ? WHERE username = ?");
        $stmt->bind_param("sss", $theme, $iscustom, $username);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function newCustomDesign($username)
    {
        if (!$this->isCustomDesignExist($username)) {
            $stmt = $this->conn->prepare("INSERT INTO `design`(designfrom) VALUES (?) ");
            $stmt->bind_param("s", $username);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function isCustomDesignExist($username)
    {
        $stmt = $this->conn->prepare("SELECT designfrom FROM `design` WHERE designfrom = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        if ($stmt->fetch()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function getDesign($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM `design` WHERE designfrom = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($data = $result->fetch_assoc()) {

            if ($data["btncorners"] === "square") {
                $btncornerradius = "0px";
            } else if ($data["btncorners"] === "slightlyrounded") {
                $btncornerradius = "3px";
            } else if ($data["btncorners"] === "rounded") {
                $btncornerradius = "7px";
            }  else if ($data["btncorners"] === "circular") {
                $btncornerradius = "99px";
            }

            $returnarr = array(
                "bgflatcolor" => $data["bgflatcolor"],
                "btnstyle" => $data["btnstyle"],
                "btncorners" => $btncornerradius,
                "btncornersname" => $data["btncorners"],
                "btnbgcolor" => $data["btnbgcolor"],
                "btntxtcolor" => $data["btntxtcolor"],
                "fontfamily" => $data["fontfamily"],
                "fontweight" => $data["fontweight"],
                "fontcolor" => $data["fontcolor"]
            );
        }
        return $returnarr;
        $stmt->close();
    }

    public function loadCustomCss($username)
    {
        // $selectors = array("selectorid"=>1,"selector"=>"bg-main");
        $cssarr = $this->getDesign($username);
        $props = array(
            array("id" => 1, "selector" => ".main-bg-color", "csselement" => "background-color", "elementvalue" => "#" . $cssarr["bgflatcolor"]),
            array("id" => 2, "selector" => ".btn-corners", "csselement" => "border-radius", "elementvalue" => $cssarr["btncorners"]),
            array("id" => 3, "selector" => ".btn-bg-color", "csselement" => "background-color", "elementvalue" => "#" . $cssarr["btnbgcolor"]),
            array("id" => 4, "selector" => ".btn-txt-color", "csselement" => "color", "elementvalue" => "#" . $cssarr["btntxtcolor"]),
            array("id" => 4, "selector" => ".font-family", "csselement" => "font-family", "elementvalue" => $cssarr["fontfamily"]),
            array("id" => 4, "selector" => ".font-color", "csselement" => "color", "elementvalue" => "#" .$cssarr["fontcolor"])
        );

        $css = '';
        foreach ($props as $item) {
            $rule = '';
            $rule .= "\n {$item['selector']}  {\n\t  {$item['csselement']}: {$item['elementvalue']}; \n}\n";
            // $rule .= "\n $item[selector]" . " {\n\t\t" . $item[csselement]. ":" . $item[elementvalue]. "}".";
            $css .= $rule;
        }
        $fp = fopen("themes/customdesign.css", "w");
        fwrite($fp, $css);
        fclose($fp);
    }

    public function updateProp($prop, $value, $username)
    {
        $query = "UPDATE `design` SET $prop = ?  WHERE designfrom = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $value, $username);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
