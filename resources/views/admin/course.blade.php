@extends('admin.components.app')

@section('body')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
    @include('admin.components.miniComponents.breadcrumbs')
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">List Materi</h2>
				<div class="filter">
					<select name="orderby" class="selectbox">
						<option value="Any time">Any time</option>
						<option value="Latest">Latest</option>
						<option value="Oldest">Oldest</option>
					</select>
				</div>
			</div>
			<div class="list_general reviews">
				<ul>
					<li>
						<span>June 15 2017</span>
						<figure><img src={{ asset("images/admin/course_1.jpg") }} alt=""></figure>
						<h4>Course title</h4>
						<p>Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis ad. In vim mucius menandri convenire, an brute zril vis. Ancillae delectus necessitatibus no eam, at porro solet veniam mel, ad everti nostrud vim. Eam no menandri pertinacia deterruisset.</p>
						<p class="inline-popups">
                            <a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-eye"></i> Lihat Materi Ini</a>
                            <a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-pencil"></i> Edit Materi Ini</a>
                            <a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-trash"></i> Hapus Materi Ini</a>
                        </p>
					</li>
					<li>
						<span>June 15 2017</span>
						<span class="rating"><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i></span>
						<figure><img src="img/course_2.jpg" alt=""></figure>
						<h4>Course title</h4>
						<p>Ex omnis error aliquam quo, eu eos atqui accusam, ex nec sensibus erroribus principes. No pro albucius eloquentiam accommodare. Mei id illud posse persius. Nec eu dico lucilius delicata, qui propriae voluptaria eu.</p>
						<p class="inline-popups"><a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-reply"></i> Reply to this review</a></p>
					</li>
					<li>
						<span>June 15 2017</span>
						<span class="rating"><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star"></i></span>
						<figure><img src="img/course_3.jpg" alt=""></figure>
						<h4>Course title</h4>
						<p>Cum id mundi admodum menandri, eum errem aperiri at. Ut quas facilis qui, euismod admodum persequeris cum at. Summo aliquid eos ut, eum facilisi salutatus ne. Mazim option abhorreant ne his. Mel simul iisque albucius at, probatus indoctum efficiendi mei ei. Veniam percipit ei sea.</p>
						<p class="inline-popups"><a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-reply"></i> Reply to this review</a></p>
					</li>
					<li>
						<span>June 15 2017</span>
						<span class="rating"><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star"></i></span>
						<figure><img src="img/avatar4.jpg" alt=""></figure>
						<h4>Teacher Lucas Swing</h4>
						<p>Qui no elit patrioque, nec eu aperiri nominati. Ei prima erant antiopam eum. Quem assum albucius pri at, his in explicari molestiae. Ad deseruisse mediocritatem vim, dictas consulatu eam no. Veniam mediocrem interpretaris pro id, iriure alterum in vis.</p>
						<p class="inline-popups"><a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-reply"></i> Reply to this review</a></p>
					</li>
				</ul>
			</div>
		</div>
@endsection