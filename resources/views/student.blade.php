<x-app-layout>
    <x-slot name="main" class="">
        <div class="flex">
            <div class="w-4/6">
                <div class="bg-white px-4 pt-4 border rounded-xl">
                @foreach($classes as $class)
                <a href="{{route('classes.student',['classesId' => $class->id])}}" class="block no-underline text-gray-500 px-4 py-2 border rounded-xl capitalize mb-4">
                    <div class="flex items-center justify-between">
                        {{ $class->name }}
                        <i class="fa fa-chevron-right"></i>
                    </div>
                </a>
                @endforeach
                </div>
            </div>

        </div>
        {{-- <div class="hidden">

        </div> --}}

    </x-slot>
    <div class="max-w-7xl mx-auto  bg-white mt-4">
    </div>

    <x-slot name="script">
        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Confirm Delete
                $(".btnConfirm").click(function() {
                    var href = $(this).data('href');
                    $("#btnDelete").attr('href', href)
                });

                $('.btnEdit').click(function() {
                    var id = $(this).data('id')
                    var url = $(this).data('url')
                    $.get(url + "/student/" + id, function({
                        data
                    }) {
                        $('#idStudent').val(data.id);
                        $('#nis').val(data.nis);
                        $('#name').val(data.name);
                        $('#gender').val(data.gender);
                        $('#major').val(data.major);
                        $('#id_classes').val(data.id_classes);
                        $('#id_period').val(data.id_period);
                        $('#address').val(data.address);
                        $('#phone').val(data.phone);
                    })
                })
            });
        </script>
    </x-slot>
</x-app-layout>
