<?php
    class BookController extends BookModel{

        /**Craete New Book */
        public function InsertBookCategory($catname,$catdescription,$addby){

            $this->createBookCategory($catname,$catdescription,$addby);
           
        }

        /**Craete New Book */
        public function InsertNewBook($catname,$itemno,$itemname,$itemdescription,$retailprice,$saleprice,$itemqty,$author){

            $this->createBook($catname,$itemno,$itemname,$itemdescription,$retailprice,$saleprice,$itemqty,$author);
           
        }

        /**Craete Book Author */
        public function InsertBookAuthor($authorname,$authorphone,$authoremail,$authoraddress){

            $this->createBookAuthor($authorname,$authorphone,$authoremail,$authoraddress);
           
        }

        /**Get all Category */
        public function showCategory(){

            global $category;
            $category = $this->getAllCategory();
                 
        }

        /**Single Category Details */
        public function categoryDetails($catid){
            global $singleCat;
             $singleCat = $this->getSingleCategory($catid);
                 
         }

        /**Get all Book */
        public function showBooks(){
            global $book;
            $book = $this->getAllBooks();                 
        }

        /**Single book Details */
        public function bookDetails($bookid, $stockno){
            global $singleBook;
             $singleBook = $this->getSingleBook($bookid, $stockno);
                 
         }


        /**Get all Author */
        public function showAuthors(){

            global $author;
            $author = $this->getAllAuthor();
                 
        }

        //Get al Book Low in stock
        public function showLowStock(){
            global $lowItem;
            $lowItem = $this->lowItem();
        }

        /**Author Details */
        public function authorDetails($vendorid){
            global $singleAuthor;
             $singleAuthor = $this->getSingleAuthor($vendorid);
                 
        }

        /**Update Category Details */
        public function updateBookCategoryDetails($catid,$catname,$catdescribe){

            $this->updateBookCategory($catid,$catname,$catdescribe);
           
        }

        /**Update Book Details */
        public function updateBookDetails($bookid, $catname, $bookno, $bookname, $bookdescribe, $bookretail, $booksale, $bookquantity, $bookauthor){

            $this->updateBook($bookid, $catname, $bookno, $bookname, $bookdescribe, $bookretail, $booksale, $bookquantity, $bookauthor);
           
        }

        /**Update Author Details */
        public function updateBookAuthorDetails($authorname,$authorphone,$authoremail,$authoraddress,$authorid){

            $this->updateBookAuthor($authorname,$authorphone,$authoremail,$authoraddress,$authorid);
           
        }


    }
