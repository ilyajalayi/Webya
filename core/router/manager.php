<?php




class Route
{
    private static function checkSlug($slug) {
        // دریافت مقدار path_info از متغیر محیطی $_SERVER
        $pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';

        // حذف کردن کاراکتر ابتدایی و پایانی /
        $pathInfo = trim($pathInfo, '/');

        // تفکیک مقادیر از path_info با / به عنوان آرایه
        $pathParts = explode('/', $pathInfo);

        // حذف کردن کاراکتر ابتدایی و پایانی /
        $slug = trim($slug, '/');

        // تفکیک مقادیر از slug با / به عنوان آرایه
        $slugParts = explode('/', $slug);

        // تعداد عناصر slug
        $numSlugParts = count($slugParts);

        // تعداد عناصر path_info
        $numPathParts = count($pathParts);

        // بررسی تعداد عناصر
        if ($numSlugParts === $numPathParts) {
            // عناصر slug و path_info را به صورت یک به یک مقایسه کرده و در صورتی که مطابقت داشته باشند، ادامه می‌دهد
            foreach ($slugParts as $key => $slugPart) {
                // اگر عنصر slug با : شروع شود، مقدار متناظر از path را به آرایه params اضافه کنید
                if (strpos($slugPart, ':') === 0) {
                    $paramName = substr($slugPart, 1);
                    $params[$paramName] = $pathParts[$key];
                } elseif ($slugPart !== $pathParts[$key]) {
                    // اگر عنصر slug با : شروع نشود و با عنصر متناظر از path برابر نباشد، مقدار false را برگردان
                    return false;
                }
            }

            // اگر همه‌ی عناصر مطابقت داشتند، پارامترها یا true (اگر slug کاملاً با path_info مطابقت داشته باشد) یا پارامترها (اگر slug دارای متغیرها بود) را برگردان
            return isset($params) ? $params : true;
        } else {
            // در غیر این صورت، مقدار false را برگردان
            return false;
        }
    }

    static function get($slug,$Controller)
    {
        $result = self::checkSlug($slug);
        if ($result === true) {
            try {
                $obj = createInstance($Controller,'');
                $res = $obj->progress();
                if($res){
                    $obj->return_view();
                }else{
               throw new Exception('error in progress method in Controller '.$Controller);
                }

            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }

        } elseif ($result !== false) {
            try {
                $obj = createInstance($Controller,$result);
                $res = $obj->progress();
                if($res){
                    echo $obj->return_view();
                }else{
                    throw new Exception('error in progress method in Controller '.$Controller);
                }

            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        } else {
            echo "Slug is neither static nor dynamic. error 404";
        }
    }
}

