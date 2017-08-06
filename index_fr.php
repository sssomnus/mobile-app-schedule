  	<header>
  		<nav>
  			<div class="container">
  				<a class="logo">
  					<img src="img/wikimania2017wiki.png" width="160px" />
  				</a>
  				<div id="nav-links">
  					<div id="page-links">
  						<a id="schedule-page-link" href="">Schedule</a>
  					</div>
  					<a id="search" data-tab="search">
  						<i class="fa fa-search"></i>
  					</a>
  				</div>
  			</div>
  		</nav>
      <nav>
        <div class="container">
          <div id="nav-links">
              <p><a href="http://wikimania.beaubien.qc.ca/?l=en">English</a> • Français</p>
          </div>
          <div id="nav-links">
            <p>
            <a href="https://wikimania2017.wikimedia.org/wiki/Venue/fr">Carte</a>&nbsp;&nbsp;•&nbsp;&nbsp;
            <a href="https://wikimania2017.wikimedia.org/wiki/Social_Events/fr">Activités sociales</a>
            </p>
          </div>
        </div>
      </nav>
  	</header>

  	<div class="container">
      <div class="main-heading"></div>
      <div id="schedule-controls"></div>
      <article id="schedule"></article>
    </div>

    <!-- template used in the day tab view -->
    <script type="text/template" id="schedule-tab-template">
    <div class="schedule-tab">
    </div>
    </script>

    <!-- template used in tabs other than the search(all sessions) tab view -->
    <script type="text/template" id="session-card-template">
    <div id="session-<%- sessionID %>" class="session-card<% if (session.programmatic) { %> session-programmatic<% } %>" data-session="<%- sessionID %>">
      <h4>
        <a href="#_session-<%- sessionID %>"><% if (session['localized title']) { %><%- smartypants(session['localized title']) %><% } else { %><%- smartypants(session.title) %><% } %></a>
      </h4>
      <div class="meta">
        <% if (session.start) { %>
        <div class="session-time item">
          <% if (session.day) { %><%- session.day %>, <% } %><%- session.start %><% if (session.end != session.start) { %>-<%- session.end %><% } %>
        </div>
        <% } %>
        <% if (session.category || session.location) { %>
        <div class="session-category-and-location item">
          <% if (session.category) { %><%- session.category %><% } %><% if (session.category&&session.location) { %>, <% } %><% if (session.location) { %><%- smartypants(session.location) %><% } %>
        </div>
        <% } %>
        <% if (session['additional language']) { %>
        <div class="session-additional-language item">
          <%- session['additional language'] %>
        </div>
        <% } %>
      </div>
    </div>
    </script>

    <!-- template used in the search(all sessions) tab view -->
    <script type="text/template" id="search-mode-session-card-template">
    <div id="session-<%- sessionID %>" class="session-card search-result<% if (session.programmatic) { %> session-programmatic<% } %>"" data-session="<%- sessionID %>">
      <h4>
        <a href="#_session-<%- sessionID %>"><% if (session['localized title']) { %><%- smartypants(session['localized title']) %><% } else { %><%- smartypants(session.title) %><% } %></a>
      </h4>
      <div class="meta">
        <% if (session.start) { %>
        <div class="session-time item">
          <% if (session.day) { %><%- session.day %>, <% } %><%- session.start %><% if (session.end != session.start) { %>-<%- session.end %><% } %>
        </div>
        <% } %>
        <% if (session.category || session.location) { %>
        <div class="session-category-and-location item">
          <% if (session.category) { %><%- session.category %><% } %><% if (session.category&&session.location) { %>, <% } %><% if (session.location) { %><%- smartypants(session.location) %><% } %>
        </div>
        <% } %>
         <% if (session.tags && session.tags.length > 0) { %>
        <div class="session-tags item">
          <%- session.tags %>
        </div>
        <% } %>
        <% if (showFacilitators && session.facilitators[1].name) { %>
        <div class="session-facilitators item">
          <%- session.facilitators_names.filter(function(name){return name.length > 0;}).join(", ") %>
        </div>
        <% } %>
        <% if (session['additional language']) { %>
        <div class="session-additional-language item">
          <%- session['additional language'] %>
        </div>
        <% } %>
        <div class="hidden session-description item">
        <% if (session.description) { %>
          <%= marked(session.description.replace('http://','').replace('https://','')) %>
        <% } %>
        </div>
      </div>
    </div>
    </script>

    <!-- template used in the session detail view -->
    <script type="text/template" id="session-detail-template">
    <div id="session-detail-wrapper">
      <a id="show-full-schedule" href="/">Back</a>
      <div id="session-detail-<%- session.id %>" class="session-detail" data-session="<%- session.id %>">
        <div class="header">
          <h4>
            <% if (session['localized title']) { %><%- smartypants(session['localized title']) %><% } else { %><%- smartypants(session.title) %><% } %>
          </h4>
        </div>
        <div class="meta">
          <% if (session.start) { %>
          <div class="session-time item">
            <% if (session.day) { %><%- session.day %>, <% } %><%- session.start %><% if (session.end != session.start) { %>-<%- session.end %><% } %>
          </div>
          <% } %>
          <% if (session.category || session.location) { %>
          <div class="session-category-and-location item">
            <% if (session.category) { %>
              <a href="#_<%- customCategoryLabel %>-<%- slugify(session.category) %>" class="category" data-category="<%- slugify(session.category) %>"><%- session.category %></a><% } %><% if (session.category&&session.location) { %>, <% } %><% if (session.location) { %><%- smartypants(session.location) %><% } %>
          </div>
          <% } %>
          <% if (session.tags && session.tags.length > 0) { %>
          <div class="session-tags item">
            <% session.tags.forEach(function(tag, index) { %><% if (index > 0) { %>, <% } %>
              <% var cleanTag = tag.replace("\"",""); %>
              <a href="#_<%- customTagLabel %>-<%- slugify(tag) %>" class="tag" data-tag="<%- slugify(tag) %>"><%- cleanTag %></a><% }) %>
          </div>
          <% } %>
          <% if (session.facilitators[1].name) { %>
          <div class="session-facilitators item">
            <% for (order in session.facilitators) { %><% if (order > 1 && session.facilitators[order].name ) { %><br><% } %><% if (session.facilitators[order].twitter) { %> <a href="https://twitter.com/<%- session.facilitators[order].twitter %>"><%- session.facilitators[order].name %></a><% } else { %><%- session.facilitators[order].name %><% } %><% if (session.facilitators[order]['affiliated org']) { %>, <%- session.facilitators[order]['affiliated org'] %><% } %><% } %>
          </div>
          <% } %>
          <% if (session['additional language']) { %>
          <div class="session-additional-language item">
            <%- session['additional language'] %>
          </div>
          <% } %>
        </div>
        <% if (session.description) { %>
        <div class="session-description">
          <% if (session['localized description']) { %><%= marked(session['localized description']) %><% } else { %><%= marked(session.description) %><% } %>
        </div>
        <% } %>
        <% if (session['additional language']) { %>
        <div class="session-title-and-description-in-english">
          <h5><%- smartypants(session.title) %></h5>
          <%= marked(session.description) %>
        </div>
        <% } %>
        <% if (session['notes url']) { %>
        <div class="session-notes-url">
          <a href="<%- session['notes url'] %>" class="btn">Notes</a>
        </div>
        <% } %>
      </div>
    </div>
    </script>

    <!-- template used in [categories] list view -->
    <script type="text/template" id="categories-list-template">
      <% categories.forEach(function(category) { %>
      <a class="category-list-item" href="#_<%- customCategoryLabel %>-<%- slugify(category.name) %>" data-category="<%- slugify(category.name) %>">
        <h4><%- category.name %></h4>
      </a>
      <% }) %>
    </script>

    <!-- template used in [tags] list view -->
    <script type="text/template" id="tags-list-template">
      <% tags.forEach(function(tag) { %>
      <a class="tag-list-item" data-tag="<%- slugify(tag.name) %>" href="#_<%- customTagLabel %>-<%- slugify(tag.name) %>">
        <h4><%- tag.name %></h4>
      </a>
      <% }) %>
    </script>

    <script src="vendor/js/jquery-2.1.0.min.js"></script>
    <script src="vendor/js/underscore-min.js"></script>
    <script src="vendor/js/marked.min.js"></script>
    <script src="js/schedule.js"></script>
    <script>
      var customConfig = {
        subHeaderText: "août 11-13  •  Montréal, Canada",
        displayNameForCategory: {
          singular:'space', // this can only be one word
          plural: 'spaces' // this can only be one word
        },
        displayNameForTag: {
          singular:'pathway', // this can only be one word
          plural: 'pathways' // this can only be one word
        },
        pathToSessionsJson: 'samplesessions.json',
        pathToCategoriesJson: 'spaces.json',
        pathToTagsJson: 'pathways.json',
        localStoragePrefix: 'wikimania-2017',
        tabList: [
          { name: 'Vendredi', displayName: 'Ven', tabDate: new Date(2017,8,11) },
          { name: 'Samedi', displayName: 'Sam', tabDate: new Date(2017,8,12) },
          { name: 'Dimanche', displayName: 'Dim', tabDate: new Date(2017,8,13) }
        ]
      }
      // instantiate the app
      new Schedule(customConfig);
    </script>