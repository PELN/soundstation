@extends('layouts.master')
@section('title', 'Products')

@section('content')
<section class="padding-y">
    <div class="container">
    <div>
        <h2 class="title text-grey mb-4">Grading guide</h2>
        <strong>Grading</strong> <p>is always record first - then cover. If lyric sheets, posters, booklets, inserts etc. are availiable they will be graded in between record and cover. Most gradings are visual. Sometimes and especially for more expensive titles, there will, however, often be a play grading.</p>
        <strong>Sound Station</strong> <p>leans towards the american Gold Mine Grading Guide. The only difference is that we have added a VG++ - Very Good Plus Plus - grading to obtain a more specific level of grading. The grading contains information on how the individual gradings correspond to the english Record Collector's Grading System (RC).</p>
        <strong>CD's</strong> <p>are rarely desribed in the grading guide as we rarely deal in CD's below M- condition. You can expect CD's offered on our website to be completely flawless unless the grading indicates otherwise.</p>
        <strong>Generally</strong> <p>we follow the guidelines below:</p>
    </div>
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">Grading</th>
                      <th scope="col">Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">SS</th>
                      <td>
                          <strong>Still Sealed</strong>
                        <p>A record is sealed if it is factory sealed - not resealed. One can expect the record, cover, innersleeve and other inserts to be unused and new in every way.</p>
                        <p>Sleeves with saw cuts and drill hole can still be sealed. This can be seen from the description.</p>
                      </td>
                    </tr>
                    <tr>
                        <th scope="row">M</th>
                        <td>
                            <strong>Mint (RC: Mint)</strong>
                            <p>The release is in every way perfect. The record is as new. The cover and extra items such as inserts, posters, lyric sheets, inner sleeves etc. are not damaged in any way.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">M-/NM</th>
                        <td>
                            <strong>Near Mint - Mint Minus</strong>
                            <p>An almost perfect record. It will show no obvious signs of wear neither will the LP sleeve - no scratches or scuffs, no ringwear, seam splits, creases or other similar noticeable defects. This goes for any insert as well.</p>
                            <p>You can expect an M- 45 rpm 7" Single to have only minor defects like very light or almost invisible ringwear.</p>
                            <p>Sound Station never grades above M-</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">VG++</th>
                        <td>
                            <strong>Very Good Plus Plus</strong>
                            <p>The VG++ grade finds its use between VG+ and M- as a means of a more specific description. The record shows some signs of having been played or handled but it is in a beautiful shape. In itself it plays almost as new, but it might have a minor surface scratch or scuff on one or both sides. A very slight warp might appear but not a combination of the defects. None of these minor defects will affect play in any way.</p>
                            <p>The outer sleeve might have slight wear such as barely noticeable ring wear, small creases and/or insignificant tear on cover and/or any insert - but not a combination of these.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">VG+</th>
                        <td>
                            <strong>Very Good Plus (RC: Excellent)</strong>
                            <p>The record will show some signs of wear - of having been played or handled but it has been taken very well care off.</p>
                            <p>The record might have two or three minor scratches or scuff on one or both sides that do not affect one's listening experience or the record might have a slight warp that does not affect play.</p>
                            <p>The label might have a light discoloration, slightly bent up corners, a tiny crease or tear. The center will not have been been misshapen by repeated play.</p>
                            <p>Picture sleeves and inserts show some ringwear or minor, general wear and can have small seam splits, stains, a cut out hole, indentation or cut corner. Even though a combination of these defects can be present, this is still a record in very good shape that would fit nicely into any collection.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">VG</th>
                        <td>
                            <strong>Very Good (RC: Very Good)</strong>
                            <p>Many of the defects found in VG+ records will be more pronounced in a VG disc.</p>
                            <p>Scratches can affect play, groove wear can be noticeable - surface noise can be present especially in the songs softer passages or in intro and fade.</p>
                            <p>Labels can have tape, sticker or residue attached to it. Writing on label can occur as well as label tear.</p>
                            <p>Besides more pronounced defects mentioned under VG++ & VG+, tape & sticker and/or residue might be evident. A cover tear might be present as well as writing on the cover. All of the defects cannot be present though.</p>
                        </td>
                    </tr>
            </table>
        </div>
    </div>
</section>
@endsection