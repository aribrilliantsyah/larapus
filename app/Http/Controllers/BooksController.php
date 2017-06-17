<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book;
use Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;



class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Builder $htmlBuilder)
    {
        //
    if ($request->ajax()) {
            $books = Book::with('author');
            return Datatables::of($books)->addColumn('action', function($book){
            return view('datatable._action',[
                'model'     => $book,
                'form_url'  => route('books.destroy', $book->id),
                'edit_url' => route('books.edit', $book->id),
                'confirm_message'=>'Yakin mau menghapus : '.$book->title.' ?'
            
                ]);
        })->make(true);
    }

    $html = $htmlBuilder
            ->addColumn(['data'=>'title','name'=>'title','title'=>'Judul'])
            ->addColumn(['data'=>'amount','name'=>'amount','title'=>'Jumlah'])
            ->addColumn(['data'=>'author.name','name'=>'author.name','title'=>'Penulis'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('books.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' =>'required|unique:books,title',
            'author_id'=>'required|exists:authors,id',
            'amount'=>'required|numeric',
            'cover'=>'image|max:20048'
            ]);

        $book = Book::create($request->except('cover'));

        //isi file cover jika ada cover yang di upload

        if($request->hasFile('cover')) {
            //mengambil file yang di upload
            $uploded_cover = $request->file('cover');

            //mengambil extensi file
            $extension = $uploded_cover->getClientOriginalExtension();
            //membuat nama file random berikut extensi
            $filename=md5(time()) .'.'. $extension;
            //menyimpan cover ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPERATOR .'img';
            $uploded_cover->move($destinationPath,$filename);

            //mengisi field cover di book dengan file name yang baru di buat
            $book->cover= $filename;
            $book->save();

        }
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $book->name"
            ]);
        return redirect()->route('books.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book =Book::find($id);
        return view('books.edit')->with(compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
