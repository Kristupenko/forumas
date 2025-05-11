<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function download($id)
    {
        $topic = Topic::with(['posts.user'])->findOrFail($id);

        $pdf = Pdf::loadView('pdf.topic', compact('topic'));

        return $pdf->download('tema_' . $topic->id . '.pdf');
    }
}

