@extends('layouts.master')
@section('title', 'Products')

@section('content')
<section class="section-content padding-y">
    <div class="container">
        <h2 class="title text-grey mb-4">Frequently asked questions</h2>

        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Shipping
                    </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <p><strong>Buyer pays all shipping cost.</strong></p>
                        <p>Shipping cost is based on number of items, the weight and destination of receiver. Shipping is calculated automatically at the shopping basket. </p>
                        <p>You can edit the contents of the shopping basket right up to the time of order and you can continuously check the contents and price of the goods. Any extra payments such as shipping will be calculated immediately before you are ready to pay.</p>
                        <p>It is possible to choose registered shipping if preferred.</p>
                        <p>We ship midday local time Tuesday and Friday. If a shipping day is on a national holiday, we will ship the following Tuesday or Friday.</p>
                        <p>Delivery in Denmark is 2-3 working days from the day of shipment.</p>
                        <p>Delivery in Europe is 5 – 8 days working days from the day of shipment.</p>
                        <p>Delivery overseas is 6 – 14 days working days from the day of shipment.</p>
                        <p><strong>Please note following on how we ship CD's:</strong></p>
                        <p>Sound Station never grade jewel cases unless irreplaceable. We always substitutes less than near mint jewel cases with new ones unless you buy CD's less than € 2.</p>
                        <p>We ship in soft bubble-plastic padded envelopes and CD's are always shipped out with jewel cases according to the previous description. Jewel cases are fragile and often prone to damage like cracks or lost hinges. We will happily ship your CD's in hard card packaging which will provide a higher level of jewel cases arriving unbroken. Please ask for alternate packaging - we will not charge extra for the packaging - only for the increase in shipping costs.</p>
                        <p><strong>Please note following on how we ship vinyl(s):</strong></p>
                        <p>We do always ship vinyl outside of their covers - placed in an appropriate clear polypropylene sleeve. We will happily open factory sealed in order to prevent seam splits. We will happily provide you with extra card packaging free of charge. We will only charge the actual increase in shipping costs, if there are any.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Payment and delivery
                    </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>We accept payment by credit card, VISA, Mastercard, VISA Electron, Master Card Direct, Maestro and PayPal. Card transactions are captured when the order is dispatched.</p>
                        <p>If you have ordered multiple items and one of the products are backordered, we draw first payment for this item when it is shipped. Prices are quoted in Euro or Danish kroner. On top of the price to be added to the price of shipping. You choose shipping type at the end of the ordering process. We deliver the products via PostNord.</p>                
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Returns
                    </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>You have the right to withdraw from the purchase without giving reasons within 14 days. The withdrawal period will expire after 14 days the day when you or another person you have chosen (not carrier), get the goods in physical possession.</p>
                        <p>If you have ordered several items in one order, and we can not deliver the goods at the same time, the withdrawal period from you or another person that you have chosen (not the carrier) is the last good physical possession. If period expires on a public holiday, Saturday, Constitution Day, Christmas Eve or New Year's Eve deadline is extended to the following working day.</p>
                        <p><strong>How you utilize the right of withdrawal</strong></p>
                        <p>You can cancel your purchase by sending an e-mail to info@soundstation.dk or tel. +45 33214043.</p>
                        <p>You can not cancel yor purchase without notifying us by e-amil og phone. The cancellation deadline is met if you send your message that you cancel your purchase before the withdrawal period has expired.</p>
                        <p><strong>The return of the product and return costs</strong></p>
                        <p>If you cancel the purchase of a product, send or deliver goods to us at Sound Station, Gl. Kongevej 94, 1850 Frederiksberg, Denmark, within 14 days after you have notified us that you wish to cancel your purchase.</p>
                        <p>You must pay for returning the goods.</p>
                        <p><strong>Refund of payment</strong></p>
                        <p>When you cancel your purchase, we will refund all payments received from you, including any delivery costs. We will refund the payment when we have received the goods back or you have supplied evidence that the goods are returned. We will carry out such reimbursement using the same means of payment as used for the initial transaction, unless you have expressly agreed otherwise.</p>
                        <p><strong>Testing of the product and packaging</strong></p>
                        <p>When returning a product, make sure that the item is securely packaged. You bear the risk of package / goods until we receive it. You are responsible for any loss of value if the product is not returned in the same condition as received.</p>
                        <p>Please keep postal receipt and possible track & trace number.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Complaints
                    </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>If you buy a product you can complain about defects in the goods within 24 months from the date of delivery by contacting us at info@soundstation.dk or tel. +45 33214043. Please be as detailed as possible describing the defect(s).</p>
                        <p>Remember that the product must always be in proper packaging and get a receipt for shipment. Save postal receipt incl. possible track & trace number.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFive">
                    <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Personal data
                    </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>In order to shop at soundstation.dk you must give the following minimum information:</p>
                        <li>Name</li>
                        <li>Address</li>
                        <li>E-mail</li>
                        <li>Telephone / mobile number</li>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingSix">
                    <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Privacy Policy
                    </button>
                    </h2>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>Sound Station understands and respects the importance of privacy on the Internet. Sound Station will not disclose information about customers / users to third parties unless necessary to implement a transaction. Sound Station will not sell any personal data including name, address, email address, credit card information to any third-party without the customer's prior permission.</p>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="mt-5">
            <h3 class="pb-3">More information? Contact us</h3>
            <button class="btn btn-outline-primary mr-2">+45 33 21 40 43</button> <button class="btn btn-outline-primary">info@soundstation.dk</button>
        </div>

    </div>
</section>
@endsection