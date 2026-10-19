<?php

class BusArTranslator
{
        public static function initData()
        {
                $trad = [];

                $trad["bus"]["bus.single"] = "باص";
                $trad["bus"]["bus.new"] = "جديد(ة)";
                $trad["bus"]["bus"] = "الباصات";
                $trad["bus"]["orgunit_id"] = "الشركة المتصرفة في الباص";
                $trad["bus"]["orgunit_id.short"] = "الشركة المتصرفة";
                $trad["bus"]["orgunit_id_tooltip"] = "الشركة المالكة أو المتصرفة في الباص في حالة أن الشركة المالكة الحقيقية غير  مسجلة في المنصة يمكن انشاؤها كأنها فرع من فروع مؤسستك وظيفته ادارة الباصات وقبض مقابل تأجير الباصات ولها محاسبتها الخاصة المستقلة";
                $trad["bus"]["owner_type_id"] = "نوع التصرف";

                $trad["bus"]["the_account_company"] = "الشركة القابضة/قسم المالية";
                $trad["bus"]["account_company_id"] = "الشركة القابضة";
                $trad["bus"]["bus_brand_id"] = "ماركة الباص";
                $trad["bus"]["bus_model_id"] = "موديل الباص";
                $trad["bus"]["bus_num"] = "ترقيم الباص في أسطول النموذج";
                $trad["bus"]["bus_color"] = "لون المركبة";
                $trad["bus"]["example"] = "نموذج فقط؟";
                $trad["bus"]["bus_code"] = "لوحة الباص";
                $trad["bus"]["bus_template_id"] = "الهيكل وعدد المقاعد";
                $trad["bus"]["driver_id"] = "السائق الافتراضي";
                $trad["bus"]["mine"] = "ملك خاص للشركة دون الفروع أو الأصل";
                $trad["bus"]["responsible_id"] = "المسؤول عن الباص";
                $trad["bus"]["booking_infos"] = "طريقة تأجير هذا الباص";
                $trad["bus"]["publish"] = "اعتبار ملكيته للفروع الأخرى";
                //$trad["bus"]["publish_help"] = "سيتم تفعيل هذه الوظيفة ان شاء الله في الاصدار 3 من المنصة ";
                $trad["bus"]["reel"] = "رقم اللوحة حقيقي؟";
                $trad["bus"]["busFileList"] = "الصور المرفقة";
                $trad["bus"]["photoGalery"] = "معرض الصور";
                $trad["bus"]["seatsCategDiv"] = "صورة تصنيف المقاعد";
                $trad["bus"]["travelBusList"] = "الرحلات القادمة";



                $trad["bus"]["parent_bus_id"] = "الباص النموذج";
                $trad["bus"]["factory_year"] = "سنة الصنع";
                $trad["bus"]["instance_nb"] = "الكمية في الأسطول";
                $trad["bus"]["nb_days_anticipate"] = "التأجير ضروري قبل";
                $trad["bus"]["nb_days_anticipate.short"] = "التأجير قبل";
                $trad["bus"]["nb_days_anticipate_tooltip"] = "عدد الأيام الأدنى بين تاريخ الرحلة وتاريخ تأجير الباص";

                $trad["bus"]["busSeatCategoryList"] = "تصنيف مقاعد هذا الباص";
                $trad["bus"]["busPricingList"] = "سعر التأجير لهذا الباص (بالريال)";
                $trad["bus"]["busPricingList_help"] = "سعر التكلفة لهذا الباص حسب البرنامج والفترة";

                $trad["bus"]["bus_level"] = "الدرجة";


                $trad["bus"]["step1"] = "المواصفات";
                $trad["bus"]["step2"] = "إرفاق الصور";
                $trad["bus"]["step3"] = "توظيف الصور";
                $trad["bus"]["step4"] = "أسعار التأجير";
                $trad["bus"]["step5"] = "تصنيف المقاعد";
                $trad["bus"]["step6"] = "معلومات التأجير";
                $trad["bus"]["step7"] = "معلومات الباص";
                $trad["bus"]["step8"] = "أسطول النموذج";
                $trad["bus"]["step9"] = "البرامج المستخدمة";
                $trad["bus"]["step10"] = "الرحلات القادمة";


                $trad["bus"]["busList"] = "أسطول النموذج";
                $trad["bus"]["travelTemplateBusList"] = "البرامج التي تستأجر هذا الباص/النموذج";

                $trad["bus"]["prices_expiry_date"] = "تاريخ انتهاء صلاحية الأسعار";
                $trad["bus"]["prices_expiry_date_tooltip"] = "تاريخ انتهاء صلاحية الأسعار يساعد النظام على الاعتماد الآلي لأسعار التذاكر اعتمادا على هذه الأسعار أسفله مادامت في فترة صلاحيتها";
                $trad["bus"]["prices_expiry_date.short"] = "صلاحية الأسعار";

                $trad["bus"]["custom_prices.short"] = "مخصصة خاصة";
                $trad["bus"]["custom_prices"] = "أسعار مخصصة لهذا الباص";

                $trad["bus"]["category"] = "فئة الباص";
                $trad["bus"]["reel_unique"] = "باص منفرد لا ينتمي إلى مجموعة بحيث يتم تعويضه بأحد إخوانه ان تخلف";
                $trad["bus"]["reel_unique.short"] = "باص منفرد";

                $trad["bus"]["template"] = "باص نموذج يمثل اسطول من الباصات تشبهه في النموذج وعدد المقاعد والموديل";
                $trad["bus"]["template.short"] = "باص نموذج";

                $trad["bus"]["generated_designed"] = "باص معين من أسطول باصات تشترك في كونها من نموذج موحد في شكله وعدد المقاعد والموديل وتم تحديده بعينه برقم اللوحة الحقيقي";
                $trad["bus"]["generated_designed.short"] = "باص معين";

                $trad["bus"]["generated_not_designed"] = "باص معروف المواصفات ولم يحدد رقم اللوحة بعد";
                $trad["bus"]["generated_not_designed.short"] = "باص لم يعين بعد";
                return $trad;
        }

        public static function getInstance()
        {
                if (false) return new BusEnTranslator();
                return new Bus();
        }
}
