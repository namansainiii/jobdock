<x-layout>
    <x-slot name="title">Create Jobs</x-slot>
<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
                <h2 class="text-4xl text-center font-bold mb-4">
                    Create Job
                </h2>
                <form
                    method="POST"
                    action="/jobs"
                    enctype="multipart/form-data"
                >
                @csrf
                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                        Job Info
                    </h2>

                    <x-input.text label="Job Title" id="title" name="title" placeholder="Software Engineer" />

                    <x-input.text-area label="Job Description" id="description" cols="30" rows="7" name="description" placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..." />

                    <x-input.text label="Annual Salary" id="salary" type="number" name="salary" placeholder="90000" />

                    <x-input.text-area label="Requirements" id="requirements" rows="2" name="requirements" placeholder="Bachelor's degree in Computer Science" />

                    <x-input.text-area label="Benefits" id="benefits" rows="2" name="benefits" placeholder="Health insurance, 401k, paid time off" />

                    <x-input.text label="Tags (comma-separated)" id="tags" name="tags" placeholder="development,coding,java,python" />

                    <x-input.select label="Job Type" id="job_type" name="job_type" :options="[
                        'Full-Time' => 'Full-Time' , 
                        'Part-Time' => 'Part-Time'
                    ]" />

                    <x-input.select label="Remote" id="remote" name="remote" :options="[
                        '0' => 'No' , 
                        '1' => 'Yes' 
                    ]" />

                    <x-input.text label="Address" id="address" name="address" placeholder="123 Main St" />

                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <x-input.text label="City" id="city" name="city" width="width:600px;" readonly/>
        
                            <x-input.text label="State" id="state" name="state" width="width:600px;" readonly/>
        
                            <x-input.text label="ZIP Code" id="zipcode" name="zipcode" width="width:600px;" readonly/>
        
                            <x-input.text label="Latitude" id="latitude" name="latitude" width="width:600px;" readonly hidden/>
        
                            <x-input.text label="Longitude" id="longitude" name="longitude"  width="width:600px;" readonly hidden/>
                        </div>
                        {{-- <div>                    
                            <div id="map" class="w-full rounded border shadow mt-4" style="height:212px; width:350px;"></div>
                        </div> --}}

                    </div>

                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                        Company Info
                    </h2>

                    <x-input.text label="Company Name" id="company_name" name="company_name" placeholder="Company Name" />

                    <x-input.text-area label="Company Description" id="company_description" rows="2" name="company_description" placeholder="Company Description" />

                    <x-input.text label="Company Website" id="company_website" type="url" name="company_website" placeholder="Enter website" />

                    <x-input.text label="Contact Phone" id="contact_phone" name="contact_phone" placeholder="Enter phone Number" />

                    <x-input.text label="Contact Email" id="contact_email" type="email" name="contact_email" placeholder="Email where you want to receive applications" />

                    <x-input.file label="Contact Logo" id="company_logo" name="company_logo" />

                    <button
                        type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                        Save
                    </button>
                </form>
            </div>
</x-layout>


<script>
let map;
let marker;
let autocomplete;

function initMap() {

    const defaultLocation = {
        lat: 28.6139,
        lng: 77.2090
    };

    map = new google.maps.Map(document.getElementById("map"), {
        center: defaultLocation,
        zoom: 5
    });

    marker = new google.maps.Marker({
        position: defaultLocation,
        map: map
    });

    autocomplete = new google.maps.places.Autocomplete(
    document.getElementById("address"),
    {
        types: ['address']
    }
);

    autocomplete.addListener("place_changed", function() {

        const place = autocomplete.getPlace();

        if (!place.geometry) {
            return;
        }

        const lat = place.geometry.location.lat();
        const lng = place.geometry.location.lng();

        map.setCenter({
            lat: lat,
            lng: lng
        });

        map.setZoom(15);

        marker.setPosition({
            lat: lat,
            lng: lng
        });

        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = lng;

        let city = '';
        let state = '';
        let zipcode = '';

        place.address_components.forEach(component => {

            const types = component.types;

            if (types.includes('locality') ||types.includes('sublocality') ||types.includes('sublocality_level_1')) {
               city = component.long_name;
            }

            if (types.includes('administrative_area_level_1')) {
                state = component.long_name;
            }

            if (types.includes('postal_code')) {
                zipcode = component.long_name;
            }

        });

        marker = new google.maps.Marker({
            position: defaultLocation,
            map: map,
            draggable: true
        });

        document.getElementById("city").value = city;
        document.getElementById("state").value = state;
        document.getElementById("zipcode").value = zipcode;

    });
}
</script>