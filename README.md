larval_preactice:ajax for php_crud 


use:

	model:
		Article
	view:
		layout:
			app
		index
		read
		_modal
	controller:
		CRUDController

	route:
		"/"
		"/read/{id}"
		"edit"
		"delete"
	database:

		seeder:
			ArticleTableSeeder		

		factory-facker:
			ArticleFactory
		
		margin:
			create_data_table
			user_table