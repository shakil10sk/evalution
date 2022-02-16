<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use App\subcategory;
use Dotenv\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Provider\Image;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $products = DB::table('products AS PRD')
                ->join('subcategories AS SUBCAT', function ($join) {
                    $join->on('SUBCAT.id', '=', 'PRD.subcategory_id');
                })
                ->join('categories AS CAT', function ($join) {
                    $join->on('CAT.id', '=', 'SUBCAT.category_id');
                })
                ->select('PRD.id', 'PRD.title as title', 'PRD.description', 'PRD.price', 'CAT.title as categoryName', 'SUBCAT.title as subcategoryName')
                ->get();

            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }



        // if ($request->ajax()) {



        //     return Datatables::of($products)
        //         ->addIndexColumn()
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        // dd($products);
        return view('admin.products.index');
        // return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        $subcategory = subcategory::all();
        return view('admin.products.create', compact('category', 'subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required'],
            'thumbnail' => ['required', 'mimes:jpeg,jpg,bmp,png'],
        ], [
            'title.required' => 'Pleae give a valid Titile',
            'thumbnail.mimes' => 'Image must be in jpeg,jpg,png,bmp',
        ]);

        $products_data = [
            'title' => $request->title,
            'description' => $request->description,
            'subcategory_id' => $request->subcategory,
            'price' => $request->price,
        ];

        if ($request->hasFile("thumbnail")) {
            //insert image
            $image = $request->file("thumbnail");

            $img = time() . "." . $image->getClientOriginalExtension();

            $location = public_path("assets/images/products/" . $img);

            $move = move_uploaded_file($image, $location);

            if ($move) {
                $products_data['thumbnail'] = $img;
            }
        }

        try {

            $insert_products = DB::table('products')->insert($products_data);
            if ($insert_products) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'successfully Product Inserted',
                ]);
            } else {

                return response()->json([
                    'status' => 'error',
                    'message' => 'Faild to Inserted Product',
                ]);
            }
        } catch (Exception $e) {
            dd($e);
            return response()->json([
                'status' => 'error',
                'message' => 'Something is Wrong',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = product::all();
        $category = category::all();
        $subcategory = subcategory::all();
        // $products->subcategories()->all();

        // $products = DB::table('products AS PRD')
        //     ->join('subcategories AS SUBCAT', function ($join) {
        //         $join->on('SUBCAT.id', '=', 'PRD.subcategory_id');
        //     })
        //     ->join('categories AS CAT', function ($join) {
        //         $join->on('CAT.id', '=', 'SUBCAT.category_id');
        //     })
        //     ->select('PRD.id', 'PRD.title as title', 'PRD.description', 'PRD.price', 'CAT.title as categoryName', 'SUBCAT.title as subcategoryName')
        //     ->get();
        // dd($products->cat);
        return view('show', compact('products', 'category', 'subcategory'));
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
    public function delete($id)
    {
        // dd($id);
        $delete = DB::table('products')->where('id', $id)->delete();
        if ($delete) {
            return response()->json([
                'status' => 'success',
                'message' => 'successfully data deleted',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'faild to delete data',
            ]);
        }
    }
}
