<?php

class BusArTranslator
{
        public static function initData()
        {
                $trad = [];

                $trad["bus"]["bus.single"] = "مركبة";
                $trad["bus"]["bus.new"] = "جديد(ة)";
                $trad["bus"]["bus"] = "المركبات";
                $trad["bus"]["work_branch_id"] = "الشركة المتصرفة في المركبة";
                $trad["bus"]["work_branch_id.short"] = "الشركة المتصرفة";
                $trad["bus"]["work_branch_id_tooltip"] = "الشركة المالكة أو المتصرفة في المركبة في حالة أن الشركة المالكة الحقيقية غير  مسجلة في المنصة يمكن انشاؤها كأنها فرع من فروع مؤسستك وظيفته ادارة المركبات وقبض مقابل تأجير المركبات ولها محاسبتها الخاصة المستقلة";
                $trad["bus"]["owner_type_id"] = "نوع التصرف";

                $trad["bus"]["the_account_company"] = "الشركة القابضة/قسم المالية";
                $trad["bus"]["account_company_id"] = "الشركة القابضة";
                $trad["bus"]["bus_brand_id"] = "ماركة المركبة";
                $trad["bus"]["bus_type_id"] = "نوع المركبة";
                $trad["bus"]["bus_model_id"] = "موديل المركبة";
                $trad["bus"]["bus_num"] = "ترقيم المركبة في أسطول النموذج";
                $trad["bus"]["bus_color"] = "لون المركبة";
                $trad["bus"]["example"] = "نموذج فقط؟";
                $trad["bus"]["bus_code"] = "لوحة المركبة";
                $trad["bus"]["bus_template_id"] = "القالب وعدد المقاعد";
                $trad["bus"]["driver_id"] = "السائق الافتراضي";
                $trad["bus"]["mine"] = "ملك خاص للشركة دون الفروع أو الأصل";
                $trad["bus"]["responsible_id"] = "المسؤول عن المركبة";
                $trad["bus"]["booking_infos"] = "طريقة تأجير هذا المركبة";
                $trad["bus"]["publish"] = "اعتبار ملكيته للفروع الأخرى";
                //$trad["bus"]["publish_help"] = "سيتم تفعيل هذه الوظيفة ان شاء الله في الاصدار 3 من المنصة ";
                $trad["bus"]["reel"] = "رقم اللوحة حقيقي؟";
                $trad["bus"]["busFileList"] = "الصور المرفقة";
                $trad["bus"]["photoGalery"] = "معرض الصور";
                $trad["bus"]["seatsCategDiv"] = "صورة تصنيف المقاعد";
                $trad["bus"]["travelBusList"] = "الرحلات القادمة";



                $trad["bus"]["parent_bus_id"] = "المركبة النموذج";
                $trad["bus"]["factory_year"] = "سنة الصنع";
                $trad["bus"]["instance_nb"] = "الكمية في الأسطول";
                $trad["bus"]["nb_days_anticipate"] = "التأجير ضروري قبل";
                $trad["bus"]["nb_days_anticipate.short"] = "التأجير قبل";
                $trad["bus"]["nb_days_anticipate_tooltip"] = "عدد الأيام الأدنى بين تاريخ الرحلة وتاريخ تأجير المركبة";

                $trad["bus"]["busSeatCategoryList"] = "تصنيف مقاعد هذا المركبة";
                $trad["bus"]["busPricingList"] = "سعر التأجير لهذا المركبة (بالريال)";
                $trad["bus"]["busPricingList_help"] = "سعر التكلفة لهذا المركبة حسب البرنامج والفترة";

                $trad["bus"]["bus_level"] = "الدرجة";


                $trad["bus"]["step1"] = "المواصفات";
                $trad["bus"]["step2"] = "إرفاق الصور";
                $trad["bus"]["step3"] = "توظيف الصور";
                $trad["bus"]["step4"] = "أسعار التأجير";
                $trad["bus"]["step5"] = "تصنيف المقاعد";
                $trad["bus"]["step6"] = "معلومات التأجير";
                $trad["bus"]["step7"] = "معلومات المركبة";
                $trad["bus"]["step8"] = "أسطول النموذج";
                $trad["bus"]["step9"] = "البرامج المستخدمة";
                $trad["bus"]["step10"] = "الرحلات القادمة";


                $trad["bus"]["busList"] = "أسطول النموذج";
                $trad["bus"]["travelTemplateBusList"] = "البرامج التي تستأجر هذا المركبة/النموذج";

                $trad["bus"]["prices_expiry_date"] = "تاريخ انتهاء صلاحية الأسعار";
                $trad["bus"]["prices_expiry_date_tooltip"] = "تاريخ انتهاء صلاحية الأسعار يساعد النظام على الاعتماد الآلي لأسعار التذاكر اعتمادا على هذه الأسعار أسفله مادامت في فترة صلاحيتها";
                $trad["bus"]["prices_expiry_date.short"] = "صلاحية الأسعار";

                $trad["bus"]["custom_prices.short"] = "مخصصة خاصة";
                $trad["bus"]["custom_prices"] = "أسعار مخصصة لهذا المركبة";

                $trad["bus"]["category"] = "فئة المركبة";
                $trad["bus"]["reel_unique"] = "مركبة منفرد لا ينتمي إلى مجموعة بحيث يتم تعويضه بأحد إخوانه ان تخلف";
                $trad["bus"]["reel_unique.short"] = "مركبة منفرد";

                $trad["bus"]["template"] = "مركبة نموذج يمثل اسطول من المركبات تشبهه في النموذج وعدد المقاعد والموديل";
                $trad["bus"]["template.short"] = "مركبة نموذج";

                $trad["bus"]["generated_designed"] = "مركبة معين من أسطول مركبات تشترك في كونها من نموذج موحد في شكله وعدد المقاعد والموديل وتم تحديده بعينه برقم اللوحة الحقيقي";
                $trad["bus"]["generated_designed.short"] = "مركبة معين";

                $trad["bus"]["generated_not_designed"] = "مركبة معروف المواصفات ولم يحدد رقم اللوحة بعد";
                $trad["bus"]["generated_not_designed.short"] = "مركبة لم يعين بعد";
                return $trad;
        }

        public static function getInstance()
        {
                if (false) return new BusEnTranslator();
                return new Bus();
        }
}
