<x-app-layout :assets="$assets ?? []">


    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Ask Me anything</h4>

                        </div>
                        <div class="card-body">
                            <div id="chatbot-container">


                                <form method="POST" id="newSessionForm">
                                    <input type="text" name="name" />
                                    <input type="text" name="email" />
                                    <button>
                                        Save
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>














    <script>
        const newSessionForm = document.querySelector('#newSessionForm')
    newSessionForm.addEventListener('submit', (e) => {
            e.preventDefault()
        handleSubmit(e)
    })
        function handleSubmit(e){

            const target = e.target
            const name = target.name.value
            const email = target.email.value

            if (name == '' )
            {
                alert('Name is empty')
                return 
            }

            if (email == '' )
            {
                alert( 'Email is empty')
                return
            }

            const iframe = document.createElement("iframe");
            iframe.style.height = "660px";
            iframe.style.width = "800px";
            iframe.className = "mx-auto";

            const url = `{{url('chatbot/session')}}`

            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    name,
                    email
                }),
            })
                .then((res) => res.json())
                .then((results) => {
                    console.log(results)

                    const url = results.url

                    iframe.src = url;
                    newSessionForm.style.display = 'none'
                });

            document.getElementById("chatbot-container").appendChild(iframe);
        
        }
    </script>

</x-app-layout>