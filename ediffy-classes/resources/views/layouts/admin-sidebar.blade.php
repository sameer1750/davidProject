<li class="treeview">
    <a href="/">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>

</li>
<li class="treeview">
    <a href="{{ route('enquiry.index') }}">
        <i class="fa fa-dashboard"></i> <span>Enquiry</span>
    </a>
</li>

<li class="treeview">
    <a href="{{ route('admission.index') }}">
        <i class="fa fa-dashboard"></i> <span>Admission</span>
    </a>
</li>



<li class="treeview">
    <a href="">
        <i class="fa fa-comments"></i>
        <span>Master</span>
        <i class="fa fa-angle-right pull-right"></i>
    </a>
    <ul class="treeview-menu">

        <li class="treeview">
        <li><a href="{{ route('course.index')  }}"><i class="fa fa-flag"></i>Course</a></li>
        <li><a href="{{ route('course-module.index')  }}"><i class="fa fa-flag"></i>Course Modules</a></li>
        <li><a href="{{ route('center.index')  }}"><i class="fa fa-flag"></i>Centers</a></li>
        <li><a href="{{ route('batch.index')  }}"><i class="fa fa-flag"></i>Batch</a></li>
        <li><a href="{{ route('enquiry-source.index')  }}"><i class="fa fa-flag"></i>Enquiry Source</a></li>
        <li><a href="{{ route('education.index')  }}"><i class="fa fa-flag"></i>Education</a></li>
        <li><a href="{{ route('area.index')  }}"><i class="fa fa-flag"></i>Area</a></li>

        <li><a href="{{ route('caste.index')  }}"><i class="fa fa-flag"></i>Caste</a></li>

        @if(auth()->user()->type_id == 1)
            <li><a href="{{ route('admin.index')  }}"><i class="fa fa-flag"></i>Sub Admins</a></li>
        @endif
        <li class="treeview">
            <a href="#">
                <i class="fa fa-share"></i> <span>Institute Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href=""><i class="fa fa-flag"></i>Show</a></li>
            </ul>
        </li>
        </li>
    </ul>
</li>
