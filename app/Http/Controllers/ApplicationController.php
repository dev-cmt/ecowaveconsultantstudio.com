<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\ApplicationExport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('paginate') != null) {
            $paginate = $request->input('paginate');
        } else {
            $paginate = 20;
        }

        $query = $request->input('query');
        $applications = User::query();

        if ($query) {
            $applications->where('phone', 'LIKE', $query)
                ->orWhere('email', $query)
                ->orWhere('social_security_num', $query);
        }

        $applications = $applications->orderBy('id', 'desc')->paginate($paginate);
        $applications->appends([
           'query' => $query
        ]);

        return view('backEnd.admin.application.index', compact('applications'));
    }

    public function downloadImage($id, $type)
    {
        $user = User::find($id);

        if ($type == 'id_front_image') {
            $file_path = $user->id_front_image;
        } elseif ($type == 'id_back_image') {
            $file_path = $user->id_back_image;
        } elseif ($type == 'face_selfie_with_id') {
            $file_path = $user->face_selfie_with_id;
        } elseif ($type == 'face_selfie') {
            $file_path = $user->face_selfie;
        }

        $file = public_path($file_path);
        return Response::download($file);
    }

    public function bulkExport(Request $request)
    {
        $ids = explode(',', $request->id);
        $file_name = 'applications_' . date('d-m-Y') . '.xlsx';
        return Excel::download(new ApplicationExport($ids), $file_name);
    }

    public function zipImageDownload($id)
    {
        $user = User::find($id);

        $zip = new ZipArchive;

        $fileName = 'applications_' . $user->social_security_num . '.zip';
        if ($zip->open(public_path($fileName), \ZipArchive::CREATE) == TRUE) {
            $files = [];
            $id_front_image = public_path($user->id_front_image);
            $id_back_image = public_path($user->id_back_image);
            $face_selfie_with_id = public_path($user->face_selfie_with_id);
            $face_selfie = public_path($user->face_selfie);
            $files = [
                $id_front_image,
                $id_back_image,
                $face_selfie,
                $face_selfie_with_id,
            ];

            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
        }

        return response()->download(public_path($fileName))->deleteFileAfterSend(true);
    }

    public function bulkDelete(Request $request)
    {
        foreach ($request->ids as $id) {
            $user = User::findOrFail($id);

            if ($user->id_front_image) {
                if (file_exists(public_path($user->id_front_image))) {
                    @unlink(public_path($user->id_front_image));
                }
            }

            if ($user->id_back_image) {
                if (file_exists(public_path($user->id_back_image))) {
                    @unlink(public_path($user->id_back_image));
                }
            }

            if ($user->face_selfie_with_id) {
                if (file_exists(public_path($user->face_selfie_with_id))) {
                    @unlink(public_path($user->face_selfie_with_id));
                }
            }

            if ($user->face_selfie) {
                if (file_exists(public_path($user->face_selfie))) {
                    @unlink(public_path($user->face_selfie));
                }
            }

            $user->delete();
        }

        return response()->json(['success']);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        if ($user->id_front_image) {
            if (file_exists(public_path($user->id_front_image))) {
                @unlink(public_path($user->id_front_image));
            }
        }

        if ($user->id_back_image) {
            if (file_exists(public_path($user->id_back_image))) {
                @unlink(public_path($user->id_back_image));
            }
        }

        if ($user->face_selfie_with_id) {
            if (file_exists(public_path($user->face_selfie_with_id))) {
                @unlink(public_path($user->face_selfie_with_id));
            }
        }

        if ($user->face_selfie) {
            if (file_exists(public_path($user->face_selfie))) {
                @unlink(public_path($user->face_selfie));
            }
        }

        $user->delete();
        return back()->with('success', 'Application deleted successfully.');
    }
}
