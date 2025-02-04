@extends(auth()->user()->role === 'admin' ? 'layouts.app' : 'layouts.user')

@section('content')
<!-- Testimoni Form Section -->
<div class="bg-white p-4 md:p-6 mt-6 md:mt-8 rounded-md shadow-md transform transition-all duration-500 hover:shadow-lg animate-slide-up mx-4 md:mx-6">
    <div class="form-header mb-4">
        <h4 class="text-lg md:text-xl font-semibold">
            Tambah Testimoni Kamu:
        </h4>
    </div>
    
    <form action="{{ route('testimoni.storeuser') }}" method="POST">
    @csrf
        
        <div class="form-group">
            <textarea 
                name="testimoni" 
                class="w-full p-3 border rounded-md @error('testimoni') border-red-500 @enderror focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all" 
                rows="4" 
                placeholder="Berikan testimoni Anda" 
                required
            >{{ old('testimoni') }}</textarea>
    
            @error('testimoni')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    
        <div class="form-group">
            <input type="hidden" name="tgl_testimoni" value="{{ date('Y-m-d') }}">
        </div>
    
        <div class="flex justify-end">
        <button type="submit" 
                id="saveBtn" 
                class="w-full sm:w-auto bg-blue-500 text-black py-2 px-6 rounded-md hover:bg-blue-600 transition-colors duration-300">
            <i class="fa fa-save"></i> Simpan Testimoni
        </button>
    </div>
</form>
</div>

<!-- Display Existing Testimoni -->
<div class="bg-white p-4 md:p-6 mt-6 md:mt-8 rounded-md shadow-md mx-4 md:mx-6">
    <h4 class="text-lg md:text-xl font-semibold mb-4">Testimoni Anda:</h4>
    @if(isset($testimonis) && count($testimonis) > 0)
        @foreach($testimonis as $testimoni)
            <div class="border-b pb-4 mb-4">
                <p class="mb-2">{{ $testimoni->testimoni }}</p>
            </div>
        @endforeach
    @else
        <p>Belum ada testimoni.</p>
    @endif
</div>
@endsection