@livewireScripts

<div class="mt-8">
    <div class="mt-4" x-data="{
        openSection: 0,
        toggle(index) {
            this.openSection = this.openSection === index ? -1 : index;
        },
        isOpen(index) {
            return this.openSection === index;
        },
        formData: {
            name: '',
            year: '1',
            area: '',
            week_from: '',
            week_to: '',
            monday: {
                content: '',
                hours: 8
            },
            tuesday: {
                content: '',
                hours: 8
            },
            wednesday: {
                content: '',
                hours: 8
            },
            thursday: {
                content: '',
                hours: 8
            },
            friday: {
                content: '',
                hours: 8
            },
            saturday: {
                content: 'frei',
                hours: 0
            },
            sunday: {
                content: 'frei',
                hours: 0
            },
        },
        postReport() {
            console.log(this.formData);
            let body = JSON.stringify(this.formData);
            let url = '/api/v1/reports';
            let method = 'POST';
            let headers = {
                'Content-Type': 'application/json',
            };
            fetch(url, {
                method: method,
                headers: headers,
                body: body
            }).then(response => {
                if (response.ok) {
                    console.log('response ok');
                    response.json().then(data => {
                        console.log(data);
                    });
                } else {
                    console.log('response not ok');
                }
            }).catch(error => {
                console.log('error', error);
            });
        },

    }">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg font-semibold text-gray-700">Neuen Eintrag anlegen</h2>
            <div>
                <form x-on:submit.prevent="postReport">
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 md:grid-cols-6">
                        <div class="md:col-span-3">
                            <label class="text-gray-700" for="username">Name</label>
                            <input x-model="formData.name"
                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
                        </div>
                        <div class="md:col-span-1">
                            <label class="text-gray-700" for="username">Jahr</label>
                            <select x-model="formData.year"
                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="number">
                                <option value="1">1. Jahr</option>
                                <option value="2">2. Jahr</option>
                                <option value="3">3. Jahr</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="text-gray-700" for="username">Bereich</label>
                            <input x-model="formData.area"
                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
                        </div>
                        <div class="md:col-span-3">
                            <label class="text-gray-700" for="username">Woche vom</label>
                            <input x-model="formData.week_start"
                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="date">
                        </div>
                        <div class="md:col-span-3">
                            <label class="text-gray-700" for="username">Woche bis</label>
                            <input x-model="formData.week_end"
                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="date">
                        </div>
                        {{-- Beginn Eintraege --}}
                        <div class="grid grid-cols-1 col-span-6 gap-6 mt-4">
                            <!-- Accordion for Monday -->
                            <div>
                                <button type="button"
                                    class="flex justify-between w-full px-2 py-2 text-left text-gray-800 bg-gray-200 rounded-md focus:outline-none"
                                    x-on:click="toggle(0)">
                                    <h3 class="font-bold">
                                        Montag
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke-width="2" stroke="currentColor" class="transition size-5 shrink-0"
                                        aria-hidden="true" :class="isOpen(0) ? 'rotate-180' : ''">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                                <div x-show="isOpen(0)" class="p-4 mt-2 bg-gray-100 rounded-md">
                                    <div class="grid grid-cols-5 gap-4">
                                        <div class="md:col-span-4">
                                            <label class="text-gray-700" for="content_monday">Inhalt Montag</label>
                                            <textarea x-model="formData.monday.content" name="content_monday" rows="4"
                                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600"></textarea>
                                        </div>
                                        <div class="md:col-span-1">
                                            <label class="text-gray-700" for="hours_monday">Stunden</label>
                                            <input x-model="formData.monday.hours"
                                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Accordion for Tuesday -->
                            <div>
                                <button type="button"
                                    class="flex justify-between w-full px-2 py-2 text-left text-gray-800 bg-gray-200 rounded-md focus:outline-none"
                                    x-on:click="toggle(1)">
                                    <h3 class="font-bold">
                                        Dienstag
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke-width="2" stroke="currentColor" class="transition size-5 shrink-0"
                                        aria-hidden="true" :class="isOpen(1) ? 'rotate-180' : ''">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                                <div x-show="isOpen(1)" class="p-4 mt-2 bg-gray-100 rounded-md">
                                    <div class="grid grid-cols-5 gap-4">
                                        <div class="md:col-span-4">
                                            <label class="text-gray-700" for="content_monday">Inhalt
                                                Dienstag</label>
                                            <textarea x-model="formData.tuesday.content" name="content_monday" rows="4"
                                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600"></textarea>
                                        </div>
                                        <div class="md:col-span-1">
                                            <label class="text-gray-700" for="hours_monday">Stunden</label>
                                            <input x-model="formData.tuesday.hours"
                                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion for Wednesday -->
                            <div>
                                <button type="button"
                                    class="flex justify-between w-full px-2 py-2 text-left text-gray-800 bg-gray-200 rounded-md focus:outline-none"
                                    x-on:click="toggle(2)">
                                    <h3 class="font-bold">
                                        Mittwoch
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke-width="2" stroke="currentColor" class="transition size-5 shrink-0"
                                        aria-hidden="true" :class="isOpen(2) ? 'rotate-180' : ''">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                                <div x-show="isOpen(2)" class="p-4 mt-2 bg-gray-100 rounded-md">
                                    <div class="grid grid-cols-5 gap-4">
                                        <div class="md:col-span-4">
                                            <label class="text-gray-700" for="content_monday">Inhalt
                                                Mittwoch</label>
                                            <textarea x-model="formData.wednesday.content" name="content_monday" rows="4"
                                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600"></textarea>
                                        </div>
                                        <div class="md:col-span-1">
                                            <label class="text-gray-700" for="hours_monday">Stunden</label>
                                            <input x-model="formData.monday.hours"
                                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion for Thursday -->
                            <div>
                                <button type="button"
                                    class="flex justify-between w-full px-2 py-2 text-left text-gray-800 bg-gray-200 rounded-md focus:outline-none"
                                    x-on:click="toggle(3)">
                                    <h3 class="font-bold">
                                        Donnerstag
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke-width="2" stroke="currentColor" class="transition size-5 shrink-0"
                                        aria-hidden="true" :class="isOpen(3) ? 'rotate-180' : ''">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                                <div x-show="isOpen(3)" class="p-4 mt-2 bg-gray-100 rounded-md">
                                    <div class="grid grid-cols-5 gap-4">
                                        <div class="md:col-span-4">
                                            <label class="text-gray-700" for="content_monday">Inhalt
                                                Donnerstag</label>
                                            <textarea x-model="formData.thursday.content" name="content_monday" rows="4"
                                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600"></textarea>
                                        </div>
                                        <div class="md:col-span-1">
                                            <label class="text-gray-700" for="hours_monday">Stunden</label>
                                            <input x-model="formData.thursday.hours"
                                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion for Friday -->
                            <div>
                                <button type="button"
                                    class="flex justify-between w-full px-2 py-2 text-left text-gray-800 bg-gray-200 rounded-md focus:outline-none"
                                    x-on:click="toggle(4)">
                                    <h3 class="font-bold">
                                        Freitag
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke-width="2" stroke="currentColor" class="transition size-5 shrink-0"
                                        aria-hidden="true" :class="isOpen(4) ? 'rotate-180' : ''">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                                <div x-show="isOpen(4)" class="p-4 mt-2 bg-gray-100 rounded-md">
                                    <div class="grid grid-cols-5 gap-4">
                                        <div class="md:col-span-4">
                                            <label class="text-gray-700" for="content_monday">Inhalt
                                                Freitag</label>
                                            <textarea x-model="formData.friday.content" name="content_monday" rows="4"
                                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600"></textarea>
                                        </div>
                                        <div class="md:col-span-1">
                                            <label class="text-gray-700" for="hours_monday">Stunden</label>
                                            <input x-model="formData.friday.hours"
                                                class="w-full mt-2 rounded-md form-input focus:border-indigo-600"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add more accordion items as needed for other days -->
                    </div>

                    {{-- Ende Eintraege --}}

                    <div class="flex justify-end mt-4">
                        <button
                            class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
