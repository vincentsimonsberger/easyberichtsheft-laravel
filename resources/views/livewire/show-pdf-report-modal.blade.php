@livewireScripts

<div class="mt-8" x-data="{
    exportPdfUrl: {
        reportId = Livewire.on('openModal', (data) => {
            return data.id;
        });
        return '/export/pdf/' + reportId;
    },
    iframeHtml: '&lt;iframe src=&quot;' + exportPdfUrl() + '&quot; class=&quot;w-full h-full min-h-[600px]&quot;&gt;';
}">
    <div class="mt-4">
        <div x-html="this.iframeHtml" class="p-6 bg-white rounded-md shadow-md">

        </div>
        <div class="flex justify-end mt-4">
            <button
                class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Speichern</button>
        </div>
    </div>
</div>
