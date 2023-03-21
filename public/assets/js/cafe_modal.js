window.addEventListener('load',()=>{
//create list services on modal
	const createListServices = (blockModal, services) => {
		blockModal.querySelector(".modal-services .list-services").innerHTML = "";
		services.forEach((service) => {
			let item = document.createElement("div");
			let itemDiv = document.createElement("div");
			let wrapButtons=document.createElement("div");
			let itemTitle = document.createElement("span");
			let itemPrice = document.createElement("span");
			let itemButtonRight = document.createElement("button");
			let itemButtonLeft = document.createElement("button");
			let itemCountService = document.createElement("span");

			item.classList.add('item-modal-service');
			item.setAttribute("id", service.id);
			wrapButtons.classList.add('change-count-services');
			itemButtonRight.classList.add('serv-btn-plus');
			itemButtonLeft.classList.add('serv-btn-minus');
			itemCountService.innerHTML=service.count;
			wrapButtons.append(itemButtonLeft);
			wrapButtons.append(itemCountService);
			wrapButtons.append(itemButtonRight);
			itemTitle.classList.add("item-modal-service_title");
			itemTitle.innerHTML = service.title;
			itemPrice.classList.add("item-modal-service_price");
			itemPrice.innerHTML = service.cost;
			// itemButton.classList.add='+';
			itemDiv.append(itemTitle);
			itemDiv.append(itemPrice);
			item.append(itemDiv);
			item.append(wrapButtons);
			blockModal.querySelector(".modal-services .list-services").append(item);
		});
	};

	//inner html on modal
	const innerHtmlData = (blockModal, data, itemInfo) => {

		if (blockModal === 0) return data;
		blockModal.querySelector("h2").innerHTML = data.title;
		blockModal.querySelector(".modal-price_total").innerHTML = data.price;
		blockModal.querySelector(".count-total").innerHTML = data.count_people;
		if (data.services !== null) {
			createListServices(blockModal, data.services);
		}

		interactionDOM(blockModal, data, itemInfo);
	};
	//change count people and price
	const changeCount = (itemGetHidden, itemInfo, index) => {
		return {
			...itemGetHidden,
			count_people: itemGetHidden.count_people + index * 1,
		};
	};

	//add service and change price
	const changeService = (itemGetHidden, serviceId,index) => {

		let services = itemGetHidden.services;
		const indexItem = services.findIndex((el) => el.id === serviceId);
		const newItem = {
			...services[serviceId - 1],

			 count:index>0?services[serviceId - 1].count+1:(services[serviceId - 1].count>0?services[serviceId - 1].count-1:services[serviceId - 1].count),
		};

		return {
			...itemGetHidden,
			services: [
				...services.slice(0, indexItem),
				newItem,
				...services.slice(indexItem + 1),
			],
		};
	};

	//////////////interaction with DOM

	const interactionDOM = (blockModal, itemGetHidden, itemInfo) => {
		//processing the number of people
		blockModal.querySelector(".set-count_plus").onclick = () => {
			const newItemHidden = changeCount(itemGetHidden, itemInfo, 1);
			setItemHidden(newItemHidden);

			innerHtmlData(blockModal, newItemHidden, itemInfo);
		};
		blockModal.querySelector(".set-count_minus").onclick = () => {
			const newItemHidden =
				itemGetHidden.count_people != 1
					? changeCount(itemGetHidden, itemInfo, -1)
					: itemGetHidden;
			setItemHidden(newItemHidden);
			innerHtmlData(blockModal, newItemHidden, itemInfo);
		};

		//processing the services

		if (
			itemInfo.services === null &&
			blockModal.querySelector(".modal-services")
		)
			blockModal.querySelector(".modal-services").remove();
		else {
			blockModal.querySelectorAll(".item-modal-service").forEach((service) => {
				service.querySelector(".serv-btn-minus").onclick = () => {
					const newItemHidden = changeService(
						itemGetHidden,
						Number(service.getAttribute("id"))
						,-1
					);
					setItemHidden(newItemHidden);
					innerHtmlData(blockModal, newItemHidden, itemInfo);
				};
				service.querySelector(".serv-btn-plus").onclick = () => {
					const newItemHidden = changeService(
						itemGetHidden,
						Number(service.getAttribute("id")),1
					);
					setItemHidden(newItemHidden);
					innerHtmlData(blockModal, newItemHidden, itemInfo);
				};
			});
		}

		return getItemHidden();
	};

	let itemGetHidden = {};
	const setItemHidden = (data) => {
		itemGetHidden = { ...data };
		return;
	};
	const getItemHidden = () => {
		return itemGetHidden;
	};
	/////////////Settings modal
	const setDataModal = (itemInfo) => {
		itemGetHidden = {
			title: itemInfo.title,
			price: itemInfo.price,
			services: itemInfo.services,
			count_people: 1,
			date: null,
		};

		const blockModal = document.querySelector(".block-modal");
		setItemHidden(itemGetHidden);

		innerHtmlData(blockModal, itemGetHidden, itemInfo);

		/////work is buttons
		//price
		blockModal.querySelector(".modal__title-price").onclick = () => {

			const count_people = getItemHidden().count_people;
			const price_itemInfo = getItemHidden().price;
			let price_services = 0;
			if (getItemHidden().services !== null) {

			price_services = getItemHidden()
					.services.filter((el) => el.count>0)
					.reduce((partialSum, a) => partialSum + (a.cost*a.count), 0);
					console.log(getItemHidden().services,price_services);
			}

			// const services=getItemHidden().services.filter(el=>el.added);
			const generalPrice = (count_people *price_itemInfo) + price_services;
			console.log(count_people,price_itemInfo,price_services);
			const newItemHidden = { ...getItemHidden(), generalPrice };
			setItemHidden(newItemHidden);
			blockModal.querySelector(".modal-price_total").innerHTML = generalPrice;
		};
		//to cart
		blockModal.querySelector(".modal__btn.in_cart").onclick = () => {
			if (getItemHidden().services !== null) {
				const services = getItemHidden().services.filter((el) => el.count>0);
				const newItemHidden = { ...getItemHidden(), services: services };
				setItemHidden(newItemHidden);
			}

			///// push on server
			console.log(getItemHidden());
			/// if pushed success
			const newEl = document.createElement("div");
			newEl.classList.add("modal_success");
			newEl.innerHTML = "Товар добавлен в корзину";
			blockModal.querySelector(".modal__btn.in_cart").after(newEl);
		};
		//cancel
		blockModal.querySelector(".modal__btn.cancel").onclick = () => {
			itemGetHidden = {};
			document.querySelector(".wrap-modal").classList.remove("active");
			document.querySelector("body").style.overflow = "auto";
			if (blockModal.querySelector(".modal_success"))
				blockModal.querySelector(".modal_success").remove();
		};
	};

	//////////////Get services
	const getServices = () => {
		if (document.querySelector(".item-service")) {
			let service = [];
			document.querySelectorAll(".item-service").forEach((el, ind) => {
				let title = el.querySelector("p").getAttribute("title");
				let cost = Number(
					el.querySelector(".add-cart-and-cost label").getAttribute("cost")
				);
				service.push({ id: ind + 1, title, cost,count:0 });
			});
			return service;
		} else return null;
	};
	// start get info end insert to modal
	const startBooking = (item) => {
		item.querySelector(".order_btn").onclick = () => {
			document.querySelector(".wrap-modal").classList.add("active");
			document.querySelector("body").style.overflow = "hidden";

			let itemInfo = {
				title: item.querySelector(".item_title").getAttribute("title"),
				services: getServices(),
				price: item.querySelector(".cost")
					? Number(item.querySelector(".cost").getAttribute("cost"))
					: 0,
			};
			setDataModal(itemInfo);
		};
	};
	if (document.querySelector(".rooms-item")) {
		document.querySelectorAll(".rooms-item").forEach((item) => {
			startBooking(item);
		});
	} else {
		if (document.querySelector(".order_btn")) {
			startBooking(document);
		}
	}
});
