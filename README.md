## Mind

It is a safe, fast and easy project development tool. 

## How is the package made?

Creating a package for Mind Framework consists of 3 steps.

1. Understanding the file hierarchy.
2. Leveraging other dependencies.
3. Creating a package document

### 1) Understanding the file hierarchy

1. **developer** 
Packages used in the project are located in the developer folder.

2. **developer_name** 
Each package is located in the folder created with the developer's name in the developer folder.

3. **package_name** 
This folder created with the package name contains the package versions.

4. **license.md**
It is the license document of the package.

5. **readme.md**
It is the main document that contains the description about the package. If you wish, you can add a list of links to this document, which facilitates access to documents in different languages.

6. **src**
The source code of the package is located in this folder.

7. **package_name.php**
It is the source code of the package. It is named with the package name and the extension of the language in which it is written.

8. **tests (optional)**
The test code of the package is located in this folder.

9. **package_name.php (optional)**
It is the test code of the package. It is named with the package name and the extension of the language in which it is written.

10. **docs (optional)**
Translations or detailed documents of the package in different languages can be found in this folder.

* developer 
    * devepoler_name
        * package_name
            * license.md
            * readme.md
            * src
              * package_name.php
            * tests (optional)
               * package_name.php (optional)
            * docs (optional)

### 2) Leveraging other dependencies

The packages we will use may sometimes need other packages. For this, we define the package's ability to access other packages using the **extends Mind** suffix.

*developer/aliyilmaz/print_pre/src/print_pre.php*

```php
class print_pre extends Mind
```
As you can see, we used the required package inside the class as follows.
```php
self::aliyilmaz('is_json')->is_json($data);
```
~~If you want, you can pass parameters to the package's constructor method. **self::aliyilmaz('is_json', ['test','test1'])->is_json($data);**~~

If you want to use the package outside of the class you can use something like:
```php
$m = new Mind();
$m::aliyilmaz('print_pre')->print_pre($data);
```

### 3) Creating a package document

It is important to create information such as the purpose of the package, dependencies, licenses.


    ## What is print_pre ?

    This function is used to display the data sent in `array` or `json` format on the screen in a readable way.

    **Out-of-class use:**

    data:
    ```php
    $data = array(
        'username'=>'aliyilmaz',
        'password'=>md5(123456)
    );

    // or json
    // $data = json_encode($data);
    ```

    code:
    ```php
    require_once('Mind.php');
    $m = new Mind();
    $m::aliyilmaz('print_pre')->print_pre($data);
    ```

    **When using it in the class:**

    code:
    ```php
    self::aliyilmaz('print_pre')->print_pre($data);
    ```

    output:
    ```php
    Array
    (
        [username] => aliyilmaz
        [password] => e10adc3949ba59abbe56e057f20f883e
    )
    ```

    ---

    ### Dependencies

    1. [is_json - 1.0.0](https://github.com/aliyilmaz/is_json)

    ---

    ### License
    Instructions and files in this directory are shared under the [GPL3](https://github.com/aliyilmaz/print_pre/tree/main/LICENSE.md) license.
