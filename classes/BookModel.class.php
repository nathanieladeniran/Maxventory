<?php
    class BookModel extends DataConnect{

        //Create Book Category
        protected function createBookCategory($catname,$catdescription,$addby){

            $setsql="INSERT INTO categories_table (category_name,description,created_by) VALUES (?,?,?)";					
            $setstmt = $this->connect()->prepare($setsql);                    
            $setstmt->execute([$catname,$catdescription,$addby]);
            if($setstmt) {
                echo "New Category Added";
            }
            else{
                 echo "Can not Add Category Book";
            }
        }

        //Create New Book
        protected function createBook($catname,$itemno,$itemname,$itemdescription,$retailprice,$saleprice,$itemqty,$author){

            $setsql="INSERT INTO stocks_table (category_name,stock_no,stock_name,stock_description,stock_retail_price,stock_sale_price,stock_quantity,stock_author) VALUES (?,?,?,?,?,?,?,?)";					
            $setstmt = $this->connect()->prepare($setsql);                    
            $setstmt->execute([$catname,$itemno,$itemname,$itemdescription,$retailprice,$saleprice,$itemqty,$author]);
            if($setstmt) {
                echo "New Book Added";
            }
            else{
                 echo "Can not Add New Book";
            }
        }

        //Create Author
        protected function createBookAuthor($authorname,$authorphone,$authoremail,$authoraddress){

            $setsql="INSERT INTO vendors_table (vendor_name,vendor_phone,vendor_email,vendor_address) VALUES (?,?,?,?)";					
            $setstmt = $this->connect()->prepare($setsql);                    
            $setstmt->execute([$authorname,$authorphone,$authoremail,$authoraddress]);
            if($setstmt) {
                echo "New Author Added";
            }
            else{
                 echo "Can not Add Author";
            }
        }


        //Get all Category
        protected function getAllCategory(){
            
            try{
                $getCat = "SELECT * FROM categories_table ORDER BY category_id DESC";
                $catStmt = $this->connect()->query($getCat);
                $results = $catStmt->fetchAll();
                return $results;                          
                
            }
            catch (PDOException $ex)
            {
                $ex->getMessage();
            }
        }

        //Get all Books
        protected function getAllBooks(){
            
            try{
                $getBook = "SELECT * FROM stocks_table ORDER BY stock_id DESC";
                $bookStmt = $this->connect()->query($getBook);
                $results = $bookStmt->fetchAll();
                return $results;                          
                
            }
            catch (PDOException $ex)
            {
                $ex->getMessage();
            }
        }

        /**Get Specific Book */
        protected function getSingleBook($bookid, $stockno){

            try{
                $getOneBook = "SELECT * FROM stocks_table WHERE stock_id=? AND stock_no =? ";
                $bookStmt = $this->connect()->prepare($getOneBook);
                $bookStmt->execute([$bookid, $stockno]);
                $results = $bookStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($bookStmt->errorInfo()); 
                }
                                              
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Get Specific Book */
        protected function getSingleCategory($catid){

            try{
                $getOneCat = "SELECT * FROM categories_table WHERE category_id=? ";
                $catStmt = $this->connect()->prepare($getOneCat);
                $catStmt->execute([$catid]);
                $results = $catStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($catStmt->errorInfo()); 
                }
                                              
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        //Get all Author
        protected function getAllAuthor(){
            
            try{
                $getAuthor = "SELECT * FROM vendors_table ORDER BY vendor_id DESC";
                $authorStmt = $this->connect()->query($getAuthor);
                $results = $authorStmt->fetchAll();
                return $results;                          
                
            }
            catch (PDOException $ex)
            {
                $ex->getMessage();
            }
        }

        //Get item low in stock
        protected function lowItem(){

            try{
                $getStock = "SELECT * FROM stocks_table WHERE stock_quantity <=100 ORDER BY stock_id DESC ";
                $stockStmt = $this->connect()->query($getStock);
                $results = $stockStmt->fetchAll();
                return $results;                          
                
            }
            catch (PDOException $ex)
            {
                $ex->getMessage();
            }
        }

        /**Get Specific Author */
        protected function getSingleAuthor($vendorid){

            try{
                $getAuthor = "SELECT * FROM vendors_table WHERE vendor_id=? ";
                $autStmt = $this->connect()->prepare($getAuthor);
                $autStmt->execute([$vendorid]);
                $results = $autStmt->fetchAll();
                if($results){
                    return $results;
                }else{
                    print_r($autStmt->errorInfo()); 
                }
                                              
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Update Book Category Details */
        protected function updateBookCategory($catid,$catname,$catdescribe){            

            try{                
                $updateDet = "UPDATE categories_table SET category_name=?,description=? WHERE category_id=? ";
                $updStmt = $this->connect()->prepare($updateDet);                
                $updStmt->execute([$catname,$catdescribe, $catid]);                
                if($updStmt){
                    echo "Category Details Updated";
                }else {
                    print_r($updStmt->errorInfo()); 
                }
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }


        /**Update Book Details */
        protected function updateBook($bookid,$catname,$bookno,$bookname,$bookdescribe,$bookretail,$booksale,$bookquantity,$bookauthor){            

            try{                
                $updateDet = "UPDATE stocks_table SET category_name=?,stock_no=?,stock_name=?,stock_description=?,stock_retail_price=?,
                stock_sale_price=?,stock_quantity=?,stock_author=? WHERE stock_id=? ";
                $updStmt = $this->connect()->prepare($updateDet);                
                $updStmt->execute([$catname,$bookno,$bookname,$bookdescribe,$bookretail,$booksale,$bookquantity,$bookauthor, $bookid]);                
                if($updStmt){
                    echo "Book Details Updated";
                }else {
                    print_r($updStmt->errorInfo()); 
                }
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }

        /**Update Author Details */
        protected function updateBookAuthor($authorname,$authorphone,$authoremail,$authoraddress,$authorid){            

            try{                
                $updateDet = "UPDATE vendors_table SET vendor_name=?, vendor_phone=?, vendor_email=?, vendor_address=? WHERE vendor_id=? ";
                $updStmt = $this->connect()->prepare($updateDet);                
                $updStmt->execute([$authorname,$authorphone,$authoremail,$authoraddress,$authorid]);                
                if($updStmt){
                    echo "Author Details Updated";
                }else {
                    print_r($updStmt->errorInfo()); 
                }
                
            }
            catch (PDOException $ex)
            {                
                $ex->getMessage();
            }
        }


    }
