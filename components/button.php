<?php
function render_button($text, $url, $type = "primary", $classes = "")
{
    $base_classes = "sm:w-auto w-full px-4 py-3 duration-300 ease-in-out text-center";
    $type_classes = "";

    switch ($type) {
        case "primary":
            $type_classes = "bg-accent text-white hover:bg-accent-dark";
            break;
        case "secondary":
            $type_classes = "bg-accent-dark text-white hover:bg-accent";
            break;
        case "outline":
            $type_classes = "border-2 border-accent text-accent hover:bg-accent hover:text-white";
            break;
        default:
            $type_classes = "bg-accent text-white hover:bg-accent-dark";
    }

    echo "<a href='$url' class='$base_classes $type_classes $classes'>$text</a>";
}
